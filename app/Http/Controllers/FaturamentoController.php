<?php

namespace App\Http\Controllers;

use App\Models\Faturamento;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Classe de controle para gerenciar operações relacionadas a faturamentos.
 */
class FaturamentoController extends Controller
{

    /**
     * Exibe uma lista de faturamentos.
     *
     * @return View
     */
    public function index(): View
    {
        $faturamentos = Faturamento::all();

        return view('faturamentos.index', compact('faturamentos'));
    }

    /**
     * Exibe o formulário de criação de um novo faturamento.
     *
     * @return View
     */
    public function create(): View
    {
        return view('faturamentos.create');
    }

    /**
     * Armazena um novo faturamento.
     *
     * @param  Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $faturamento = Faturamento::create($request->all());

        return redirect()->route('faturamento.index');
    }

    /**
     * Exibe os detalhes de um faturamento específico.
     *
     * @param  Faturamento $faturamento
     * @return View
     */
    public function show(Faturamento $faturamento): View
    {
        return view('faturamentos.show', compact('faturamento'));
    }

    /**
     * Exibe o formulário de edição de um faturamento específico.
     *
     * @param  Faturamento $faturamento
     * @return View
     */
    public function edit(Faturamento $faturamento): View
    {
        return view('faturamentos.edit', compact('faturamento'));
    }

    /**
     * Atualiza um faturamento específico.
     *
     * @param  Request $request
     * @param  Faturamento $faturamento
     * @return RedirectResponse
     */
    public function update(Request $request, Faturamento $faturamento): RedirectResponse
    {
        $faturamento->update($request->all());

        return redirect()->route('faturamentos.index');
    }

    /**
     * Remove um faturamento específico.
     *
     * @param  Faturamento $faturamento
     * @return RedirectResponse
     */
    public function destroy(Faturamento $faturamento): RedirectResponse
    {
        $faturamento->delete();

        return redirect()->route('faturamentos.index');
}

}
