@extends('layouts.app')

@section('content')
    <h1>Detalhes do Veículo</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Placa: {{ $veiculo->placa }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Modelo: {{ $veiculo->modelo }}</h6>
            <p class="card-text">Marca: {{ $veiculo->marca }}</p>
            <p class="card-text">Ano: {{ $veiculo->ano }}</p>
            <p class="card-text">Status: {{ $veiculo->status }}</p>
        </div>
    </div>

    <a href="{{ route('veiculos.index') }}" class="btn btn-primary mt-3">Voltar para a Lista de Veículos</a>
@endsection
