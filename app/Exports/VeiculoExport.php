<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class VeiculoExport implements FromCollection, WithHeadings, WithColumnFormatting, WithColumnWidths
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Placa',
            'Modelo',
            'Marca',
            'Ano',
            'Criado em',
            'Atualizado em',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => '0',
            'B' => 'General',
            'C' => 'General',
            'D' => 'General',
            'E' => '0',
            'F' => 'yyyy-mm-dd HH:mm:ss',
            'G' => 'yyyy-mm-dd HH:mm:ss',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 15,
            'C' => 15,
            'D' => 15,
            'E' => 8,
            'F' => 30,
            'G' => 30,
        ];
    }
}