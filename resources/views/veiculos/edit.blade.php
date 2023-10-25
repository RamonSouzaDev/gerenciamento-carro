@extends('layouts.app')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar veículo</title>
</head>
<body>
    <div class="card-box">
        <form class="form-group" action="/veiculos/{id}" method="post">
            @csrf
            <input class="form-control" type="text" name="placa" value="{{ $veiculo->placa }}" placeholder="Placa">
            <input class="form-control" type="text" name="modelo" value="{{ $veiculo->modelo }}" placeholder="Modelo">
            <input class="form-control" type="text" name="marca" value="{{ $veiculo->marca }}" placeholder="Marca">
            <input class="form-control" type="number" name="ano" value="{{ $veiculo->ano }}" placeholder="Ano">
            <input class="btn btn-primary" type="submit" value="Salvar">
        </form>
    </div>
</body>
</html>
