<?php

namespace App\Http\Controllers;

use App\Models\Mecanico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Classe de controle para gerenciar operações relacionadas a mecânicos.
 */
class MecanicoController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return View
     */
    public function index(): View
    {
        $mecanicos = Mecanico::paginate(10);

        return view('mecanicos.index', compact('mecanicos'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return View
     */
    public function create(): View
    {
        return view('mecanicos.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Request @request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $mecanico = new Mecanico();
        $mecanico->fill($request->all());
        $mecanico->save();

        return redirect()->route('mecanicos.index');
    }

    /**
     * Display the specified resource.
     * 
     * @param Request $request
     * @return View
     */
    public function show(int $id): View
    {
        $mecanico = Mecanico::find($id);
        return view('mecanicos.show', compact('mecanico'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param Faturamento $faturamento
     * @return View
     */
    public function edit(int $id): View
    {
        $mecanico = Mecanico::find($id);
        return view('mecanicos.edit', compact('mecanico'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param Request $request
     * @param Faturamento $faturamento
     * @return RedirectResponse
     */
    public function update(Request $request, Mecanico $mecanico): RedirectResponse
    {
        $mecanico->fill($request->all());
        $mecanico->save();

        return redirect()->route('mecanicos.show', $mecanico);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param Faturamento $faturamento
     * @return RedirectResponse
     */
    public function destroy(Mecanico $mecanico): RedirectResponse
    {
        $mecanico->delete();

        return redirect()->route('mecanicos.index');
    }
}
