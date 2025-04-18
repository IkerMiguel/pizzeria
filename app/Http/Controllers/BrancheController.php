<?php

namespace App\Http\Controllers;

use App\Models\Branche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrancheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = DB::table('branches')->get();

        return view('branche.index', ['branches' => $branches]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('branche.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('branches')->insert([
            'name' => $request->name,
            'address' => $request->address,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $branches = DB::table('branches')->get();

        return view('branche.index', ['branches' => $branches]);
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
