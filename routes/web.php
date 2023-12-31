<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderProductsController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Models\Order;

Auth::routes();

// Route::get('/', [HomeController::class, 'index']);

Route::redirect('/', '/dashboard');

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);

// Route::get('login', [HomeController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth']], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('Apps')->group(function () {
        Route::view('Contacts', 'apps/contacts');
        Route::view('Orders', 'apps/orders');
        Route::view('Users', 'apps/users');
    });

    Route::view('/Shipping', 'shipping');
    Route::view('/Discount', 'discount');

    // Route::prefix('Products')->group(function () {
    //     Route::redirect('/', '/Products/List');
    //     Route::view('List', 'products/list');
    //     Route::view('Detail', 'products/detail');
    // });

    Route::prefix('Orders')->group(function () {
        Route::redirect('/', '/Orders/List');
        Route::view('List', 'orders/list');
        Route::view('Detail', 'orders/detail');
    });

    Route::prefix('Customers')->group(function () {
        Route::redirect('/', '/Customers/List');
        Route::view('List', 'customers/list');
        Route::view('Detail', 'customers/detail');
    });
    Route::prefix('Storefront')->group(function () {
        Route::redirect('/', '/Storefront/Home');
        Route::view('Home', 'storefront/home');      
        // Route::view('Categories', 'storefront/categories');
        Route::view('Detail', 'storefront/detail');
        Route::view('Cart', 'storefront/cart');
        Route::view('Checkout', 'storefront/checkout');
        Route::view('Invoice', 'storefront/invoice');
    });

    Route::prefix('Settings')->group(function () {
        Route::view('/', 'settings/index');
        Route::view('General', 'settings/general');
    });

    Route::prefix('Settings')->group(function () {
        Route::view('/', 'shpping/index');
        Route::view('General', 'settings/general');
    });

    //Route::get('users', [UserController::class, 'index'])->name('users');

    // Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    // Route::resource('products', ProductController::class);
    Route::resource('orderProducts', OrderProductsController::class);
    Route::resource('home', HomeController::class);
    Route::get('product/{category}', [ProductController::class, 'productCategory'])->name('product-category');
    Route::get('product/variation/{product}', [ProductController::class, 'productVariation'])->name('product-variation');
    Route::get('product/details/{productSpecifications}/{quantity}', [ProductController::class, 'productDetails'])->name('product-details');

    // Route::resource('orders', OrderController::class);
    // Route::resource('profile', ProfileController::class);

    // Route::get('products-list', [ProductController::class, 'productList'])->name('products.list');
    // Route::get('products-variation/{id}', [ProductController::class, 'productVariation'])->name('products.list.variation');
    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
});
