<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\CartService;

class CartController extends Controller
{
    public function show() {
        return view('cart', ['cart' => Session::get('cart')]);
    }

    public function add(Request $request) {
        CartService::addToCart($request);
        return redirect()->back();
    }
}
