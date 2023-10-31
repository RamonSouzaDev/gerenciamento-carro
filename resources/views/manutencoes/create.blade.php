@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Nova manutenção</h1>

    <form action="{{ route('manutencoes.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="veiculo_id" class="form-label">Veículo</label>
            <select id="veiculo_id" name="veiculo_id" class="form-control">
                @foreach ($veiculos as $veiculo)
                <option value="{{ $veiculo->id }}">{{ $veiculo->placa }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="pendente">Pendente</option>
                <option value="concluída">Concluída</option>
                <option value="reprovada">Reprovada</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data de início</label>
            <input type="date" id="data_inicio" name="data_inicio" class="form-control">
        </div>

        <div class="mb-3">
            <label for="data_fim" class="form-label">Data de fim</label>
            <input type="date" id="data_fim" name="data_fim" class="form-control">
        </div>

        <div class="mb-3">
            <label for="valor_estimado">Valor estimado</label>
            <input type="number" name="valor_estimado" id="valor_estimado" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="valor_final">Valor final</label>
            <input type="number" name="valor_final" id="valor_final" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="comentarios" class="form-label">Comentários</label>
            <textarea id="comentarios" name="comentarios" class="form-control" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('manutencoes.index') }}" class="btn btn-primary">Voltar</a>
    </form>
</div>
@endsection