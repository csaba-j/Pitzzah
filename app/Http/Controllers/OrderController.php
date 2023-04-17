<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Services\CartService;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $order = Order::create([
            'user_id' => Auth::id(),
            'items' => $cart,
            'total' => Session::has('total') ? Session::get('total') : throw new Exception('Total is null on order store.')
        ]);
        Session::flash('message', 'A megrendelését sikeresen fogadtuk!');
        Session::forget('cart');
        return redirect()->to('dashboard');
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
