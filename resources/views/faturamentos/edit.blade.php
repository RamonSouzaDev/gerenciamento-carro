@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Editar faturamento</h1>

                <form action="{{ route('faturamentos.update', $faturamento->id) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="manutencao_id">Manutenção</label>
                        <select name="manutencao_id" id="manutencao_id" class="form-control" required>
                            <option value="{{ $faturamento->manutencao->id }}">{{ $faturamento->manutencao->nome }}</option>
                            @foreach ($manutencoes as $manutencao)
                                <option value="{{ $manutencao->id }}">{{ $manutencao->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="number" name="valor" id="valor" class="form-control" value="{{ $faturamento->valor }}" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="{{ $faturamento->status }}">{{ $faturamento->status }}</option>
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
