@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar manutenção</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h1>Editar manutenção</h1>

    <form action="{{ route('manutencoes.update', $manutencao) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="veiculo_id" class="form-label">Veículo</label>
            <select id="veiculo_id" name="veiculo_id" class="form-control">
                @foreach ($veiculos as $veiculo)
                    <option value="{{ $veiculo->id }}" {{ $manutencao->veiculo_id == $veiculo->id ? 'selected' : '' }}>{{ $veiculo->placa }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="pendente" {{ $manutencao->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="concluída" {{ $manutencao->status == 'concluída' ? 'selected' : '' }}>Concluída</option>
                <option value="reprovada" {{ $manutencao->status == 'reprovada' ? 'selected' : '' }}>Reprovada</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data de início</label>
            <input type="date" id="data_inicio" name="data_inicio" class="form-control" value="{{ $manutencao->data_inicio }}">
        </div>

        <div class="mb-3">
            <label for="data_fim" class="form-label">Data de fim</label>
            <input type="date" id="data_fim" name="data_fim" class="form-control" value="{{ $manutencao->data_fim }}">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="3">{{ $manutencao->descricao }}</textarea>
        </div>

        <div class="mb-3">
            <label for="comentarios" class="form-label">Comentários</label>
            <textarea id="comentarios" name="comentarios" class="form-control" rows="5">{{ $manutencao->comentarios }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('manutencoes.index') }}" class="btn btn-primary">Voltar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
@endsection