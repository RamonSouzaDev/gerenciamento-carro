<?php

namespace Database\Seeders;

use App\Models\Veiculo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $veiculos = [
            ['placa' => 'ABC-1234', 'modelo' => 'Gol', 'marca' => 'Volkswagen', 'ano' => 2023],
            ['placa' => 'DEF-5678', 'modelo' => 'Onix', 'marca' => 'Chevrolet', 'ano' => 2022],
            ['placa' => 'GHI-9012', 'modelo' => 'Corolla', 'marca' => 'Toyota', 'ano' => 2021],
        ];

        foreach ($veiculos as $veiculo) {
            Veiculo::create($veiculo);
        }
    }
}
