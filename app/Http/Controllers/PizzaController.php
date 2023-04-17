<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use Illuminate\Support\Facades\Storage;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pizza.index', ['pizzas' => Pizza::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_filename = $request->file('img')->getClientOriginalName().'.'.$request->file('img')->getClientOriginalExtension();
        $pizza = Pizza::create([
            'name' => $request->get('name'),
            'category' => $request->get('category'),
            'price' => $request->get('price'),
            'img' => $new_filename
        ]);
        $request->file('img')->storeAs('/', $new_filename, 'public');

        return redirect()->to('/pizza');
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
        return view('admin.pizza.edit', ['pizza' => Pizza::getById($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pizza = Pizza::getById($id);
        $pizza->fill($request->only(['name', 'price', 'category']));
        if ($request->hasFile('img')) { 
            $new_filename = $pizza->id.'.'.$request->file('img')->getClientOriginalExtension();
            Storage::disk('public')->delete($pizza->img);
            $request->file('img')->storeAs('/', $new_filename, 'public');
            $pizza->img = $new_filename;
        }
        $pizza->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pizza = Pizza::getById($id);
        Storage::disk('public')->delete($pizza->img);
        $pizza->delete();
        return redirect()->to('/pizza');
    }
}
