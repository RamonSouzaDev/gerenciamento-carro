@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da manutenção</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0JLn5q+8nbTov4+1p" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h1>Detalhes da manutenção</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Veículo</th>
                <th>Status</th>
                <th>Data de início</th>
                <th>Data de fim</th>
                <th>Descrição</th>
                <th>Comentários</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $manutencao->id }}</td>
                <td>{{ $manutencao->veiculo->placa }}</td>
                <td>{{ $manutencao->status }}</td>
                <td>{{ $manutencao->data_inicio }}</td>
                <td>{{ $manutencao->data_fim }}</td>
                <td>{{ $manutencao->descricao }}</td>
                <td>{{ $manutencao->comentarios }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('manutencoes.edit', $manutencao) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('manutencoes.destroy', $manutencao) }}" class="btn btn-danger">Excluir</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0JLn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
@endsection