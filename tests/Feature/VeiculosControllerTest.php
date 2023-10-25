<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Veiculo;
use App\Http\Controllers\VeiculosController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VeiculosControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Teste para visualizar a lista de veículos.
     */
    public function testVisualizarListaDeVeiculos()
    {
        $response = $this->get('/veiculos');

        $response->assertStatus(200);
        $response->assertViewIs('veiculos.index');
        $response->assertViewHas('veiculos');
    }

    /**
     * Teste para salvar um veículo.
     */
    public function testSalvarVeiculo()
    {
        $data = [
            'placa' => 'AAA-1234',
            'modelo' => 'Fiat Uno',
            'marca' => 'Fiat',
            'ano' => 2023,
        ];

        $response = $this->post('/veiculos', $data);

        $response->assertStatus(302);
        $response->assertRedirect('/veiculos');

        $veiculo = Veiculo::where('placa', $data['placa'])->first();

        $this->assertEquals($data['placa'], $veiculo->placa);
        $this->assertEquals($data['modelo'], $veiculo->modelo);
        $this->assertEquals($data['marca'], $veiculo->marca);
        $this->assertEquals($data['ano'], $veiculo->ano);
    }

}
