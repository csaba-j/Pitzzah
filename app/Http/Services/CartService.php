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
        CartService::addTotalToSession();
        Session::flash('message', 'Hozzáadva a kosárhoz!');
    }

    public static function editItem(Request $request) {
        $id = $request->get('id');
        $cart = Session::get('cart');
        if(isset($cart[$id])) {
            $cart[$id]['amount'] = $request->get('amount');
            $cart[$id]['subtotal'] = $request->get('amount') * $cart[$id]['price'];
        } else {
            Session::flash('error', 'Nincs ilyen tétel a kosárban!');
        }

        Session::put('cart', $cart);
        CartService::addTotalToSession();
        Session::flash('message', 'Sikeres szerkesztés!');
    }

    public static function deleteCart() {
        Session::forget('cart');
        Session::forget('total');
        Session::flash('message', 'A kosár törölve.');
    }

    public static function removeItem(Request $request) {
        $cart = Session::get('cart');
        unset($cart[$request->get('id')]);
        count($cart) > 0 ? Session::put('cart', $cart ) : Session::forget('cart');
        CartService::addTotalToSession();
        Session::flash('message', 'A tétel törölve.');
    }

    public static function addTotalToSession() {
        if (Session::has('cart')) {
            $total = CartService::calculateTotal();
            Session::put('total', $total);
        } return;
    }

    public static function calculateTotal() {
        $cart = Session::get('cart');
        $total = 0;
        foreach($cart as $item){
            $total += $item['subtotal'];
        }
        return $total;
    }
}