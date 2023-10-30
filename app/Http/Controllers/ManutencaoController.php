<?php

namespace App\Http\Controllers;

use App\Models\Manutencao;
use Illuminate\Http\Request;

class ManutencaoController extends Controller
{
    public function index()
    {
        $manutencoes = Manutencao::all();

        return view('manutencoes.index', compact('manutencoes'));
    }

    public function create()
    {
        return view('manutencoes.create');
    }

    public function store(Request $request)
    {
        $manutencao = new Manutencao();
        $manutencao->fill($request->all());
        $manutencao->save();

        return redirect()->route('manutencoes.index');
    }

    public function show(int $id)
    {
        $manutencao = Manutencao::find($id);
        return view('manutencoes.show', compact('manutencao'));
    }

    public function edit(int $id)
    {
        $manutencao = Manutencao::find($id);
        return view('manutencoes.edit', compact('manutencao'));
    }

    public function update(Request $request, Manutencao $manutencao)
    {
        $manutencao->fill($request->all());
        $manutencao->save();

        return redirect()->route('manutencoes.show', $manutencao);
    }

    public function destroy(Manutencao $manutencao)
    {
        $manutencao->delete();

        return redirect()->route('manutencoes.index');
    }
}
