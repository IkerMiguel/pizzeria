<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza_size;
use Illuminate\Support\Facades\DB;
 

class Pizzas_sizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $pizzas_sizes = DB::table('pizza_size')
        ->join('pizzas', 'pizza_size.pizza_id', '=', 'pizzas.id')
        ->select('pizza_size.*', 'pizzas.name as pizza_name')
        ->get();

    return view('pizzas_size.index', ['pizzas_sizes' => $pizzas_sizes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
         $pizzas = DB::table('pizzas')->get();
        return view('pizzas_size.new', compact('pizzas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0',
        ]);

        DB::table('pizza_size')->insert([
            'pizza_id' => $request->pizza_id,
            'size' => $request->size,
            'price' => $request->price,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('pizzas_sizes.index')->with('success', 'Tamaño de pizza agregado exitosamente.');

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
