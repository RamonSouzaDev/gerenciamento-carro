<?php

namespace App\Helpers;

use Maatwebsite\Excel\Excel;

class ExcelExportHelper
{
    public static function exportToExcel($data, $exportClass, $fileName, $format = 'Xlsx')
    {
        $excel = app(Excel::class);
        return $excel->download(new $exportClass($data), $fileName, $format);
    }
}

