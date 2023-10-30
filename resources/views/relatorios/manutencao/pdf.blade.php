<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Manutenções</title>
</head>
<body>
    <h1 class="display-4">Relatório de Manutenções</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Veículo</th>
                <th>Status</th>
                <th>Data de Início</th>
                <th>Data de Fim</th>
                <th>Descrição</th>
                <th>Comentários</th>
            </tr>
        </thead>
        <tbody>
            @foreach($manutencoes as $manutencao)
                <tr>
                    <td>{{ $manutencao->id }}</td>
                    <td>{{ $manutencao->veiculo->placa }}</td>
                    <td>{{ \App\Enums\ManutencaoStatusEnum::getDescription($manutencao->status) }}</td>
                    <td>{{ \Carbon\Carbon::parse($manutencao->data_inicio)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($manutencao->data_fim)->format('d/m/Y') }}</td>
                    <td>{{ $manutencao->descricao }}</td>
                    <td>{{ $manutencao->comentarios }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
