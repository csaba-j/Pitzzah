<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('order', OrderController::class, [
        'names' => [
            'store' => 'order.store',
            'create' => 'order.create'
        ]
    ])->only(['store', 'create']);

    Route::get('/dashboard', function () {
        return view('dashboard', ['pizzas' => \App\Models\Pizza::all()]);
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/edit', [CartController::class, 'edit'])->name('cart.edit');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/delete', [CartController::class, 'delete'])->name('cart.delete');

    Route::get('/cart/get-cart', [CartController::class, 'get']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function() {
    Route::resource('pizza', PizzaController::class, [
        'names' => [
            'index' => 'pizza.index',
            'store' => 'pizza.store',
            'create' => 'pizza.create'
        ]
    ]);
        Route::resource('orders', OrderController::class, [
        'names' => [
            'index' => 'orders.index',
        ]
    ])->only(['index']);
});

require __DIR__.'/auth.php';
