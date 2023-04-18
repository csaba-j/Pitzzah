<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\CartService;

use Exception;

class CartController extends Controller
{
    /**
     * Show the cart page with the cart contents.
     */
    public function show() {
        return view('cart', ['cart' => Session::get('cart'), 'total' => Session::get('total')]);
    }
    
    /**
     * Adds an item to the shopping cart.
     */
    public function add(Request $request) {
        CartService::addToCart($request);
        return redirect()->back();
    }

    /**
     * Edits a single item in the shopping cart.
     */
    public function edit(Request $request) {
        Session::has('cart') ? CartService::editItem($request) : throw new Exception('Cart is null on edit.');
        return redirect()->back();
    }

    /**
     * Deletes the shopping cart and its contents.
     */
    public function delete() {
        CartService::deleteCart();
        return redirect()->to('dashboard');
    }

    /**
     * Removes an item from the shopping cart. If it becomes empty, removes the cart too and redirects to the dashboard.
     */
    public function remove(Request $request) {
        CartService::removeItem($request);
        return Session::has('cart') ? redirect()->back() : redirect()->to('dashboard');
    }
}
