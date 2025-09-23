<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <a href="/">Voltar</a>
    <div id="caixa" class="container text-center  border">
        <h1>Vendas aqui</h1>
        @foreach ($vendas as $venda)
            <div class="row  border rounded m-1">
                <div class="col">ID: {{$venda->id}}</div>
                <div class="col">Data: {{$venda->momento}}</div>
                <div class="col">Valor: {{$venda->valor}}</div>
                <div class="col">Forma: {{$venda->forma}}</div>
            </div>
        @endforeach
    </div>
</body>
</html>