<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderProductsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            DB::beginTransaction();

            $cartItems = \Cart::getContent();

            $orderId = Order::create(['state' => 'pending', 'user_id' => Auth::user()->id])->id;

            foreach ($cartItems as $key => $cart) {
                OrderProducts::create(['product_specifications_id' => $cart['id'], 'order_id' => $orderId, 'quantity' => $cart['quantity']]);
            }

            DB::commit();

            \Cart::clear();

            return redirect()->route('cart.list')
                ->with('success', 'Pedido realizado com sucesso');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('cart.list')
                ->with('warning', 'Erro ao salvar os dados!');
        }
    }
}
