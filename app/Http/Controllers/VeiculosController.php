<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Exports\VeiculoExport;
use App\Enums\VeiculoStatusEnum;
use App\Helpers\ExcelExportHelper;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Classe de controle para gerenciar operações relacionadas a veículos.
 *
 * @package App\Http\Controllers
 */
class VeiculosController extends Controller
{
    /**
     * Exibe uma lista de veículos.
     *
     * @return View
     */
    public function index(): View
    {
        $veiculos = Veiculo::all();

        return view('veiculos.index', compact('veiculos'));
    }

    /**
     * Exibe o formulário de criação de um novo veículo.
     *
     * @return View
     */
    public function create(): View
    {
        return view('veiculos.create');
    }

    /**
     * Armazena um novo veículo.
     *
     * @param  Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $veiculo = new Veiculo();
        $veiculo->placa = $request->input('placa');
        $veiculo->modelo = $request->input('modelo');
        $veiculo->marca = $request->input('marca');
        $veiculo->ano = $request->input('ano');
        $veiculo->status = VeiculoStatusEnum::EXCELENTE;

        $veiculo->save();

        return redirect()->route('veiculos.index');
    }

    /**
     * Exibe o formulário de edição de um veículo específico.
     *
     * @param  int $id
     * @return View
     */
    public function edit($id): View
    {
        $veiculo = Veiculo::findOrFail($id);

        return view('veiculos.edit', compact('veiculo'));
    }

    /**
     * Atualiza um veículo específico.
     *
     * @param  Request $request
     * @param  int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->placa = $request->input('placa');
        $veiculo->modelo = $request->input('modelo');
        $veiculo->marca = $request->input('marca');
        $veiculo->ano = $request->input('ano');

        $veiculo->save();

        return redirect()->route('veiculos.index');
    }

    /**
     * Remove um veículo específico.
     *
     * @param  int $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();

        return redirect()->route('veiculos.index');
    }

    /**
     * Exibe os detalhes de um veículo específico.
     *
     * @param  int $id
     * @return View
     */
    public function show($id): View
    {
        $veiculo = Veiculo::findOrFail($id);

        return view('veiculos.show', compact('veiculo'));
    }

    /**
     * Exporta veículos para um arquivo Excel.
     *
     * @param  Request $request
     * @return BinaryFileResponse
     */
    public function exportarExcel(Request $request)
    {
        $veiculos = Veiculo::all();

        return ExcelExportHelper::exportToExcel($veiculos, VeiculoExport::class, 'veiculos.xlsx');
    }

}
