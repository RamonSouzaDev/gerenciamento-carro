@extends('layouts.app')
@php use App\Enums\FaturamentoStatusEnum; @endphp
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Faturamentos</h1>
                <a href="{{ route('faturamento.create') }}" class="btn btn-success float-end">Novo faturamento</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Manutenção</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faturamentos as $faturamento)
                            <tr>
                                <td>{{ $faturamento->id }}</td>
                                <td>{{ $faturamento->manutencao?->descricao }}</td>
                                <td>{{ $faturamento->valor }}</td>
                                <td>{{ FaturamentoStatusEnum::getDescription($faturamento->status) }}</td>
                                <td>
                                    <a href="{{ route('faturamento.show', $faturamento->id) }}" class="btn btn-primary">Ver</a>
                                    <a href="{{ route('faturamento.edit', $faturamento->id) }}" class="btn btn-warning">Editar</a>
                                    <a href="{{ route('faturamento.destroy', $faturamento->id) }}" class="btn btn-danger">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $faturamentos->links() }}
            </div>
        </div>
    </div>
    
@endsection
