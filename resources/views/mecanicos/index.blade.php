@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Mecânicos</h1>
    <a href="{{ route('mecanicos.create') }}" class="btn btn-primary mb-2 float-end">Adicionar Mecânico</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mecanicos as $mecanico)
                <tr>
                    <td>{{ $mecanico->nome }}</td>
                    <td>{{ $mecanico->especialidade }}</td>
                    <td>{{ $mecanico->email }}</td>
                    <td>{{ $mecanico->telefone }}</td>
                    <td>
                        <a href="{{ route('mecanicos.edit', $mecanico->id) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('mecanicos.destroy', $mecanico->id) }}" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $mecanicos->links() }}
</div>
@endsection
