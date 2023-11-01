@extends('layouts.app')

@section('content')
<body>
    <div class="container">
        <h1>Veículos</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Placa</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($veiculos as $veiculo)
                <tr>
                    <td>{{ $veiculo->placa }}</td>
                    <td>{{ $veiculo->modelo }}</td>
                    <td>{{ $veiculo->marca }}</td>
                    <td>{{ $veiculo->ano }}</td>
                    <td>
                        <a href="{{ route('veiculos.edit', $veiculo) }}" class="btn btn-primary"><i class="bi bi-pencil"></i> Editar</a>
                        <form method="POST" action="{{ route('veiculos.destroy', $veiculo) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                        <a href="{{ route('veiculos.exportar') }}" class="btn btn-success">Exportar Excel</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('veiculos.create') }}" class="btn btn-primary">Registrar veículo</a>
    </div>
</body>

</html>
@endsection