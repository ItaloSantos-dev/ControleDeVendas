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
    <a href="/estoque">Voltar</a>
    <div class="container text-center">
        <h1>Produto aqui</h1>
        <div class="row">
            <div class="col">
                <img src="{{asset($produto->imagem)}}" alt="image" class="img-fluid shadow rounded m-2">
            </div>
        </div>
        <div class="row rounded">
            <div class="col"><p>Nome: {{$produto->nome}} | Preco: {{$produto->preco}} | Marca: {{$produto->marca}} | Quantidade: {{$produto->quantidade}}</p></div>
        </div>
        <div class="row rounded">
            <p>{{$produto->descricao}}</p>
        </div>
    </div>

</body>
</html>