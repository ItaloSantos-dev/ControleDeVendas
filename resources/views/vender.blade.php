<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vender</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        #carrinho{
            max-height: 50vh;
        }
        #limpar{
            left: 93%;
        }
    </style>
</head>
<body>
    <a href="/">Voltar</a>
    <div class="container position-relative text-center border rounded p-3">
        <form id="limpar" class=" mt-2 translate-middle position-absolute" action="{{route('vendas.limparcarrinho')}}" method="post">
            @csrf
            <input class="btn btn-danger d-inline" type="submit" value="Limpar Carrinho">
        </form> 
        <h1>Carrinho</h1>
        <div class="row">
            <div class="col">
                @if(session()->has('error'))
                    <h2 class=" text-danger">{{session('error')}}</h2>
                 @endif
            </div>
        </div>
        <form action="{{route('vendas.addcarrinho')}}" method="post">
            @csrf
            <div class="row">
                <label for="id" class="col">Id</label>
                <label for="qtd" class="col">Quantidade</label>
                <div class="col"></div>
            </div>
            <div class="row mb-3">
                <input class="col" type="number" name="id" id="id">
                <input class="col" type="number" name="qtd" id="qtd">
                <div class="col">
                    <button type="submit" class="btn btn-secondary">Adicionar</button>
                </div>
            </div>
        </form> 
    </div>


    <div id="carrinho" class="container border ">
        @if(session()->has('carrinho'))
            @foreach(session('carrinho') as $id=>$item)
                <div class="row border rounded m-1">
                    <div class="col">Item: {{$item['produtobuscado']->nome}}</div>
                    <div class="col">Marca: {{$item['produtobuscado']->marca}}</div>
                    <div class="col">Preço: {{$item['produtobuscado']->preco}}</div>
                    <div class="col">Quantidade: {{$item['qtd']}}</div>
                    <form class="col" action="{{route('vendas.removerdocarrinho', $item['produtobuscado']->id)}}" method="post">
                        @csrf
                        <button type="submit" value="" class="bi bi-trash btn btn-danger "> </button>
                    </form>
                </div>
            @endforeach
        @endif
    </div>
    @if(session()->has('valorfinaldacompra'))
        <div class="container">
            <div class="row rounded border shadow mt-2">
                <div class="col">
                    Valor total: {{session('valorfinaldacompra')}}
                </div>
            </div>
        </div>
    @endif




</body>
</html>