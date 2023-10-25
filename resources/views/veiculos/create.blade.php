<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar veículo</title>
</head>
<body>
    <form action="/veiculos" method="post">
        @csrf
        <input type="text" name="placa" placeholder="Placa">
        <input type="text" name="modelo" placeholder="Modelo">
        <input type="text" name="marca" placeholder="Marca">
        <input type="number" name="ano" placeholder="Ano">
        <input type="submit" value="Criar">
    </form>
</body>
</html>
