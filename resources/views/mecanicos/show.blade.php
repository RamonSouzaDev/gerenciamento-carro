@extends('layouts.app')

@section('content')
    <h1>Detalhes do Mecânico</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nome: {{ $mecanico->nome }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Especialidade: {{ $mecanico->especialidade }}</h6>
            <p class="card-text">Email: {{ $mecanico->email }}</p>
            <p class="card-text">Telefone: {{ $mecanico->telefone }}</p>
        </div>
    </div>

    <a href="{{ route('mecanicos.index') }}" class="btn btn-primary mt-3">Voltar para a Lista de Mecânicos</a>
@endsection
