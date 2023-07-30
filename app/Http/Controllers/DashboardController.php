<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $customersAmount = User::all()->count();
        $ordersAmount = Order::all()->count();
        $orders = Order::limit(10)->get();
        return view('dashboard', compact('orders', 'customersAmount', 'ordersAmount'));
    }
}
