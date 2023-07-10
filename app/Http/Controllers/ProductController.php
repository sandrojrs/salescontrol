<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPhotos;
use App\Models\ProductSpecifications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):view
    {
        //
        $data = Product::latest()->paginate(5);

        return view('products.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
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

                $photo = $foto->storeAs('public/fotos' .$nomeFoto);

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

        foreach($sizes as $key => $size) {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
    
}
