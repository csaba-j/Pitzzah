<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartService
{
    /**
     * Adds a single item to the shopping cart, creating the cart if it does not exist.
     * Also calculates the subtotal of the item types.
     */
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

    /**
     * Edits a single item in the shopping cart, while calculating the new subtotal of the item.
     */
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

    /**
     * Deletes the shopping cart.
     */
    public static function deleteCart() {
        Session::forget('cart');
        Session::forget('total');
        Session::flash('message', 'A kosár törölve.');
    }

    /**
     * Removes an item from the shopping cart. If it becomes empty, removes the cart too.
     */
    public static function removeItem(Request $request) {
        $cart = Session::get('cart');
        unset($cart[$request->get('id')]);
        count($cart) > 0 ? Session::put('cart', $cart ) : Session::forget('cart');
        CartService::addTotalToSession();
        Session::flash('message', 'A tétel törölve.');
    }

    /**
     * Adds the total cost of all the items to the session.
     */
    public static function addTotalToSession() {
        if (Session::has('cart')) {
            $total = CartService::calculateTotal();
            Session::put('total', $total);
        } return;
    }

    /**
     * Helper function to calculate the total cost of all the items.
     */
    public static function calculateTotal() {
        $cart = Session::get('cart');
        $total = 0;
        foreach($cart as $item){
            $total += $item['subtotal'];
        }
        return $total;
    }
}