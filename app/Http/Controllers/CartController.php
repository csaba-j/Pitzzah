<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\CartService;

use Exception;

class CartController extends Controller
{
    public function show() {
        return view('cart', ['cart' => Session::get('cart'), 'total' => Session::get('total')]);
    }
    
    public function add(Request $request) {
        CartService::addToCart($request);
        return redirect()->back();
    }

    public function edit(Request $request) {
        Session::has('cart') ? CartService::editItem($request) : throw new Exception('Cart is null on edit.');
        return redirect()->back();
    }

    public function delete() {
        CartService::deleteCart();
        return redirect()->to('dashboard');
    }

    public function remove(Request $request) {
        CartService::removeItem($request);
        return Session::has('cart') ? redirect()->back() : redirect()->to('dashboard');
    }
}
