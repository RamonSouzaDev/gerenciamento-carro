@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manutenções</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1>Manutenções</h1>
        <a href="{{ route('manutencoes.create') }}" class="btn btn-success float-end">Nova manutenção</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Veículo</th>
                    <th>Status</th>
                    <th>Descrição</th>
                    <th>Data de início</th>
                    <th>Data de fim</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($manutencoes as $manutencao)
                <tr>
                    <td>{{ $manutencao->id }}</td>
                    <td>{{ $manutencao->veiculo->placa }}</td>
                    <td>{{ $manutencao->descricao }}</td>
                    <td>{{ \App\Enums\ManutencaoStatusEnum::getDescription($manutencao->status) }}</td>
                    <td>{{ \Carbon\Carbon::parse($manutencao->data_inicio)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($manutencao->data_fim)->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('manutencoes.show', $manutencao) }}" class="btn btn-primary">Detalhes</a>
                        <a href="{{ route('manutencoes.edit', $manutencao) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('manutencoes.destroy', $manutencao) }}" class="btn btn-danger">Excluir</a>
                        <a href="{{ route('manutencao.exportar-pdf', $manutencao) }}" class="btn btn-success">
                            <i class="bi bi-file-pdf"></i> Baixar PDF
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $manutencoes->links() }}

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
@endsection