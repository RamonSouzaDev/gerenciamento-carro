<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Enums\VeiculoStatus;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Helpers\ExportHelper;
use Illuminate\Http\Response;
use App\Exports\VeiculoExport;
use Yajra\DataTables\DataTables;
use App\Helpers\ExcelExportHelper;

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
        $veiculo->status = VeiculoStatus::EXCELENTE;

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

    /**
     * Exporta os dados para planilha em Excel.
     *
     * @param Request $request
     * @return Response
     */
    public function exportarExcel(Request $request)
    {
        $veiculos = Veiculo::all();

        return ExcelExportHelper::exportToExcel($veiculos, VeiculoExport::class, 'veiculos.xlsx');
    }
}
