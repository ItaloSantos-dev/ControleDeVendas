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
    <a href="/estoque">voltar</a>
    <h1 class="text-center">Cadastrar produto</h1>

    <form action="{{route('produtos.store')}}" method="post" class="container text-center rounded border" enctype="multipart/form-data">
        @csrf
           <div class="row">
                <label for="nome" class="col form-label m-1">Nome:</label>
                <label for="preco" class="col form-label m-1">Preço:</label>
           </div>
           <div class="row">
                <input id="nome" name="nome" type="text" class="col m-1">
                <input id="preco" step="0.01" name="preco" type="number" class="col m-1">
            </div>

            <div class="row">
                <label  for="marca" class="col form-label m-1">Marca:</label>
                <label  for="qtd" class="col form-label m-1">Quantidade:</label>
           </div>
           <div class="row">
                <input id="marca" name="marca" type="text" class="col m-1">
                <input id="qtd" name="qtd" type="number" class="col m-1">
            </div>

            <div class="row">
                <label class="m-1" for="img">Url da imagem:</label>
            </div>
            <div class="row ">
                <input class="coltext-center form-control" type="file" name="img" id="img">
            </div>

            <div class="row">
                <label class="m-1" for="desc">Descrição</label>
            </div>
            <div class="row">
                <textarea style="resize:none; height: 35vh;" class="col m-1" name="desc" id="desc"></textarea>
            </div>
            <div class="row">
                <div class="col">
                    <input type="submit" value="Enviar" class="btn btn-primary m-1">
                </div>
            </div>
            
    </form>
</body>
</html>