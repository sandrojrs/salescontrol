<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = order::all();
        return view('orders.list', compact('orders'));
    }

       /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.detail', compact('order'));
    }
}
