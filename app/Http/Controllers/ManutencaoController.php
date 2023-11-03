<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\View\View;
use App\Models\Manutencao;
use Illuminate\Http\Request;
use App\Helpers\PdfExportHelper;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Jobs\EnviarEmailNotificacaoManutencaoJob;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Classe de controle para gerenciar operações relacionadas a manutenções.
 */
class ManutencaoController extends Controller
{
    /**
     * Exibe uma lista de manutenções.
     * 
     * @return View
     */
    public function index(): View
    {
        $manutencoes = Cache::remember('manutencoes', 01, function () {
            return Manutencao::paginate(10);
        });
    
        return view('manutencoes.index', compact('manutencoes'));
    }

    /**
     * Exibe o formulário de criação de uma nova manutenção
     * 
     * @return View
     */
    public function create(): View
    {
        return view('manutencoes.create');
    }

    /**
     * Armazena uma nova manutenção.
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $manutencao = new Manutencao();
        $manutencao->fill($request->all());
        $manutencao->save();

        dispatch(new EnviarEmailNotificacaoManutencaoJob($manutencao));

        return redirect()->route('manutencoes.index');
    }

    /**
     * Exibe o formulário de edição de uma manutenção específica.
     * 
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $manutencao = Manutencao::find($id);
        return view('manutencoes.show', compact('manutencao'));
    }

    /**
     * Exibe um formulário de edição de uma manutenção específica.
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $manutencao = Manutencao::find($id);
        return view('manutencoes.edit', compact('manutencao'));
    }

    /**
     * Atualiza uma manutenção específica.
     * 
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $manutencao = Manutencao::findOrFail($id);
        $manutencao->fill($request->all());
        $manutencao->save();

        return redirect()->route('manutencoes.show', $manutencao);
    }

    /**
     * Remove uma manuteção específica.
     */
    public function destroy(Manutencao $manutencao)
    {
        $manutencao->delete();

        return redirect()->route('manutencoes.index');
    }

    /**
     * Exporta manutenções para um arquivo PDF.
     * 
     * @return Response
     */
    public function exportarPDF(): Response
    {
        $manutencoes = Manutencao::all();

        return PdfExportHelper::gerarPDF('relatorios.manutencao.pdf', ['manutencoes' => $manutencoes], ['relatorio_manutencoes.pdf']);
    }

}

