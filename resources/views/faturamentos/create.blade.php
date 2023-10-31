@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Criar faturamento</h1>

            <form action="{{ route('faturamento.store') }}" method="post">
                @csrf

                <div class="mg-3">
                    <label for="manutencao_id">Manutenção</label>
                    <select name="manutencao_id" id="manutencao_id" class="form-control" required>
                        <option value="">Selecione uma manutenção</option>
                        @foreach ($manutencoes as $manutencao)
                        <option value="{{ $manutencao->id }}">{{ $manutencao->descricao }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mg-3">
                    <label for="valor">Valor</label>
                    <input type="number" name="valor" id="valor" class="form-control" required>
                </div>

                <div class="mg-3">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" id="descricao" class="form-control" required>
                </div>

                <div class="mg-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="pendente">Pendente</option>
                        <option value="aprovado">Aprovado</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection