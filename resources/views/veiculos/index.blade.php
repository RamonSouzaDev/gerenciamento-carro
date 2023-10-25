@extends('layouts.app')
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
                            <a href="/veiculos/{{ $veiculo->id }}/edit">Editar</a> |
                            <a href="/veiculos/{{ $veiculo->id }}/destroy">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
