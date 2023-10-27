@extends('layouts.app')
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Criar veículo</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Adicionar veículo</h1>

                <form method="POST" action="{{ route('veiculo.store') }}" style="display: inline;">
                    <div class="mb-3">
                        <label for="placa" class="form-label">Placa</label>
                        <input type="text" name="placa" id="placa" class="form-control" placeholder="Insira a placa do veículo">
                    </div>
                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Insira o modelo do veículo">
                    </div>
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" name="marca" id="marca" class="form-control" placeholder="Insira a marca do veículo">
                    </div>
                    <div class="mb-3">
                        <label for="ano" class="form-label">Ano</label>
                        <input type="number" name="ano" id="ano" class="form-control" placeholder="Insira o ano do veículo">
                    </div>
                   
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-primary">Criar</button>
                    </form>
                <a href="{{ route('veiculos.index') }}" class="btn btn-primary">Voltar</a>
                
            </div>
        </div>
    </div>
</body>

</html>