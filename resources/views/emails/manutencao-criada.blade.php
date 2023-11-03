<!DOCTYPE html>
<html>
<p>Descrição {{ $manutencao->descricao }},</p>

<p>Uma nova manutenção foi criada para o seu veículo {{ $manutencao->veiculo->placa }}.</p>

<p>Os detalhes da manutenção são:</p>

<ul>
    <li>ID: {{ $manutencao->id }}</li>
    <li>Data de início: {{ \Carbon\Carbon::parse($manutencao->data_inicio)->format('d/m/Y') }}</li>
    <li>Data de fim: {{ \Carbon\Carbon::parse($manutencao->data_fim)->format('d/m/Y') }}</li>
    <li>Status: {{ $manutencao->status }}</li>
    <li>Descrição: {{ $manutencao->descricao }}</li>
    <li>Comentários: {{ $manutencao->comentarios }}</li>
</ul>

<p>Para visualizar a manutenção, acesse o seguinte link:</p>

<a href="{{ route('manutencoes.show', $manutencao) }}">Visualizar manutenção</a>

<p>Atenciosamente,</p>

<p>Equipe do sistema de manutenção</p>
</html>