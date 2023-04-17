<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartService
{
    public static function addToCart(Request $request) {
        Session::put('msg', 'asd');
        $pizza = Pizza::getById($request->get('id'));
        $cart = Session::get('cart') ?: [];
        if(isset($cart[$pizza->id])) {
            $cart[$pizza->id]['amount'] += $request->get('amount');
        } else {
            $cart[$pizza->id] = $pizza;
            $cart[$pizza->id]['amount'] = $request->get('amount');
         }
        Session::put('cart', $cart);
        Session::flash('message', 'Hozzáadva a kosárhoz!');
    }
}