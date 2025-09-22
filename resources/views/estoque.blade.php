<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <a href="/">Voltar</a>
    
    <div class="container text-center">
        <h1>Estoque</h1>
        <a class="btn btn-success m-1" href="/cadastrarproduto">Cadastrar produto</a>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($produtos as $produto)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ $produto->imagem }}" class="card-img-top" alt="{{ $produto->nome }}">
                        <div class="card-body">
                        <h5 class="card-title">{{ $produto->nome }} | {{$produto->marca}} | {{$produto->quantidade}}</h5>
                        <h5 class="card-subtitle"><strong>R$ {{ $produto->preco }}</strong></h5>
                        </div>
                        <div class="card-footer">
                            <form action="{{route('produtos.destroy', $produto)}}" method="post">
                                @csrf 
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Apagar">
                                <a href="{{route('produtos.show', $produto->id)}}" class="btn btn-info">Ver mais</a>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>