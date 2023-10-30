<?php

namespace App\Http\Controllers;

use App\Models\Mecanico;
use Illuminate\Http\Request;

class MecanicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mecanicos = Mecanico::all();

        return view('mecanicos.index', compact('mecanicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mecanicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mecanico = new Mecanico();
        $mecanico->fill($request->all());
        $mecanico->save();

        return redirect()->route('mecanicos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $mecanico = Mecanico::find($id);
        return view('mecanicos.show', compact('mecanico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $mecanico = Mecanico::find($id);
        return view('mecanicos.edit', compact('mecanico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mecanico $mecanico)
    {
        $mecanico->fill($request->all());
        $mecanico->save();

        return redirect()->route('mecanicos.show', $mecanico);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mecanico $mecanico)
    {
        $mecanico->delete();

        return redirect()->route('mecanicos.index');
    }
}
