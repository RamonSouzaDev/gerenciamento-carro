@extends('layouts.app')
@php use App\Enums\FaturamentoStatusEnum; @endphp
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Detalhes do faturamento</h1>

                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $faturamento->id }}</td>
                        </tr>
                        <tr>
                            <th>Manutenção</th>
                            <td>{{ $faturamento->manutencao?->descricao }}</td>
                        </tr>
                        <tr>
                            <th>Valor</th>
                            <td>{{ $faturamento->valor }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ FaturamentoStatusEnum::getDescription($faturamento->status) }}</td>
                        </tr>
                    </tbody>
                </table>

                <a href="{{ route('faturamento.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
@endsection
