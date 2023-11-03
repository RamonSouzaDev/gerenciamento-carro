<?php

namespace App\Helpers;

use Dompdf\Dompdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Response;

class PdfExportHelper
{
    /**
     * Gera um arquivo PDF.
     * 
     * @return Response
     */
    public static function gerarPDF(string $view, array $data, array $nomeArquivo): Response
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

        return $pdf->download($nomeArquivo[0]);
    }
}
