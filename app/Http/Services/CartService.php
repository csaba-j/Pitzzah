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
        $pizza = Pizza::getById($request->get('id'));
        $cart = Session::get('cart') ?: [];
        if(isset($cart[$pizza->id])) {
            $cart[$pizza->id]['amount'] += $request->get('amount');
            $cart[$pizza->id]['subtotal'] += $request->get('amount') * $pizza->price;
        } else {
            $cart[$pizza->id] = $pizza;
            $cart[$pizza->id]['amount'] = $request->get('amount');
            $cart[$pizza->id]['subtotal'] = $request->get('amount') * $pizza->price;
        }
        Session::put('cart', $cart);
        Session::flash('message', 'Hozzáadva a kosárhoz!');
    }

    public static function deleteCart() {
        Session::forget('cart');
        Session::flash('message', 'A kosár törölve.');
    }

    public static function removeItem(Request $request) {
        $cart = Session::get('cart');
        unset($cart[$request->get('id')]);
        count($cart) > 0 ? Session::put('cart', $cart ) : Session::forget('cart');
        Session::flash('message', 'A tétel törölve.');
    }
}