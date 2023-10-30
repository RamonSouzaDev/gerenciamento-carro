<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
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

        $response->assertFound();
    }

    /**
     * Teste para salvar um veículo.
     */
    public function testSalvarVeiculo()
    {
        $user = User::factory()->create();

        $data = [
            'placa' => 'AAA-1234',
            'modelo' => 'Fiat Uno',
            'marca' => 'Fiat',
            'ano' => 2023,
        ];

        // Simula o login
        $this->actingAs($user);

        $response = $this->post('/veiculos/store', $data);

        $veiculo = Veiculo::where('placa', $data['placa'])->first();

        dd($veiculo);

        $this->assertEquals($data['placa'], $veiculo->placa);
        $this->assertEquals($data['modelo'], $veiculo->modelo);
        $this->assertEquals($data['marca'], $veiculo->marca);
        $this->assertEquals($data['ano'], $veiculo->ano);
    }

}
