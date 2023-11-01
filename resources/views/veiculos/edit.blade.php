@extends('layouts.app')
@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar veículo</title>
</head>
<body>
    <div class="card-box">
    <h1 class="text-center">Editar veículo</h1>
    <form method="PUT" action="{{ route('veiculos.update', $veiculo->id) }}" style="display: inline;">
            @csrf
            <input class="form-control" type="text" name="placa" value="{{ $veiculo->placa }}" placeholder="Placa">
            <input class="form-control" type="text" name="modelo" value="{{ $veiculo->modelo }}" placeholder="Modelo">
            <input class="form-control" type="text" name="marca" value="{{ $veiculo->marca }}" placeholder="Marca">
            <input class="form-control" type="number" name="ano" value="{{ $veiculo->ano }}" placeholder="Ano">
            </p>
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="{{ route('veiculos.index') }}" class="btn btn-primary">Voltar</a>
        </form>
    </div>
</body>
</html>
@endsection