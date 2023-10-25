<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VeiculosController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::all();

        return view('veiculos.index', compact('veiculos'));
    }

    public function create()
    {
        return view('veiculos.create');
    }

    public function store(Request $request)
    {
        $veiculo = new Veiculo();
        $veiculo->placa = $request->input('placa');
        $veiculo->modelo = $request->input('modelo');
        $veiculo->marca = $request->input('marca');
        $veiculo->ano = $request->input('ano');

        $veiculo->save();

        return redirect()->route('veiculos.index');
    }

    public function edit($id)
    {
        $veiculo = Veiculo::findOrFail($id);

        return view('veiculos.edit', compact('veiculo'));
    }

    public function update(Request $request, $id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->placa = $request->input('placa');
        $veiculo->modelo = $request->input('modelo');
        $veiculo->marca = $request->input('marca');
        $veiculo->ano = $request->input('ano');

        $veiculo->save();

        return redirect()->route('veiculos.index');
    }

    public function destroy($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();

        return redirect()->route('veiculos.index');
    }

    public function show($id)
    {
        $veiculo = Veiculo::findOrFail($id);

        return view('veiculos.show', compact('veiculo'));
    }
}
