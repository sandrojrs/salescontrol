<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPhotos;
use App\Models\ProductSpecifications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\View\View;
use \stdClass;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Http\Controllers\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): view
    {
        //
        $data = Product::latest()->paginate(5);

        return view('products.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function productList()
    {
        $products = Product::all();
        return view('products.list', compact('products'));
    }

    public function productVariation($product_id)
    {
        $product = Product::find($product_id);
        foreach ($product->productVariation as $variation_id => $variation) {
            $totalQuantity = 0;
            foreach ($variation->orders as $key => $order) {
                $totalQuantity += $order->quantity;
            }
            $totalQuantity =  $variation->quantity - $totalQuantity;

            $productObj = new stdClass();
            $productObj->id = $variation->id;
            $productObj->name = $product->name;
            $productObj->price = $product->price;
            $productObj->size = $variation->size;
            $productObj->quantity_available = $totalQuantity;
            $productVariation[] = $productObj;
        }

        return view('products.list_variation', compact('productVariation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('products.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:products',
            'price' => 'required'
        ]);

        $input = $request->all();

        $product = Product::create($input);
        $idProduto = $product->id;

        $i = 0;

        if ($request->hasFile('fotos')) {
            $fotos = $request->file('fotos');

            foreach ($fotos as $foto) {

                $default = $i <= 0 ? 1 : 0;

                $nomeFoto = uniqid() . '.' . $foto->getClientOriginalExtension();

                $photo = $foto->storeAs('public/fotos' . $nomeFoto);

                //  $path = $foto->store('fotos', 'public');

                ProductPhotos::create([
                    'description' => $request->description,
                    'photo' => $nomeFoto,
                    'default' => $default,
                    'product_id' => $idProduto
                ]);
                $i++;
            }
        }

        $sizes = $request->size;
        $quantitys = $request->quantity;

        foreach ($sizes as $key => $size) {
            ProductSpecifications::create([
                'size' => $size,
                'quantity' => $quantitys[$key],
                'product_id' => $idProduto
            ]);
        }

        return redirect()->route('products.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view('products.edit', compact('product'));
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
       
        $request->validate([
            'price' => ['required'],
            Rule::unique('products')->ignore($product->id),
        ]);

        $input = $request->all();
        $product->update($input);

        if ($request->hasFile('fotos')) {
            $fotos = $request->file('fotos');

            foreach ($fotos as $foto) {

                $nomeFoto = uniqid() . '.' . $foto->getClientOriginalExtension();

                $photo = $foto->storeAs('public/fotos' . $nomeFoto);

                //  $path = $foto->store('fotos', 'public');

                ProductPhotos::create([
                    'photo' => $nomeFoto,
                    'default' => 0,
                    'product_id' => $product->id
                ]);
            }
        }
        
        $sizes = $request->size;
        $quantitys = $request->quantity;

        foreach ($sizes as $key => $size) {
            if($key > 0) {
                ProductSpecifications::create([
                    'size' => $size,
                    'quantity' => $quantitys[$key],
                    'product_id' => $product->id
                ]);
            }

        }

        return redirect()->route('products.index')
            ->with('success', 'Produto atualizado com sucesso');


    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
    //
      $id = $product->id;
      $post = Product::find($id);
      $post->productPhoto->each->delete();
      //$post->productPhoto->delete();
      $post->productSpecification->each->delete();
      $post->delete();

      return redirect('/products');

    }

    public function removerImagem(Request $request) {
      $id = $request->all();
      if(!is_int($id) && $id <= 0) {
        return false;
      } 
   
      $productPhoto = ProductPhotos::findOrFail($id)->first();
    
      if(\Storage::disk('public')->delete('fotos'.$productPhoto->photo)) {
        $productPhoto->delete();
        return response()->json(['data' => array('status'=> 'sucesso')],200);
      }     
    }
}