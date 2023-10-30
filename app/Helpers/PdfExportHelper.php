<?php

namespace App\Helpers;

use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class PdfExportHelper
{
    public static function gerarPDF($view, $data, $nomeArquivo)
    {
        $pdf = new PDF(
            new Dompdf(),
            app('config'),
            app('files'),
            app('view')
        );

        $pdf->loadView( 
            $view, 
            $data, 
            $nomeArquivo
        );

        return $pdf->download('relatorio_manutencoes.pdf');
    }
}
