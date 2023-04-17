<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Services\CartService;

use Exception;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.orders', [
            'orders' => Order::orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order',  ['pizzas' => \App\Models\Pizza::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = Session::has('cart') ? Session::get('cart') : throw new Exception('Cart is null on order store.');
        $total = Session::has('total') ? Session::get('total') : throw new Exception('Total is null on order store.');
        $order = Order::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'items' => $cart,
            'total' => $total
        ]);
        Session::forget('cart');
        Session::forget('total');
        return view('thankyou', ['cart' => $cart, 'total' => $total]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
