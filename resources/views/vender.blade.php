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
        #confirmar{
            max-width: 60vw;
            left: -50%;
            transition-duration: 0.5s ;
            
            
        }
    </style>
</head>
<body>
    <a href="/">Voltar</a>
    <!-- Headeer -->
    <div class="container position-relative text-center border rounded p-3">
        <form id="limpar" class=" mt-2 translate-middle position-absolute" action="{{route('vendas.limparcarrinho')}}" method="post">
            @csrf
            <input class="btn btn-danger d-inline" type="submit" value="Limpar Carrinho">
        </form> 
        <h1>Carrinho</h1>
        <div class="row">
            <div class="col">
                @if(session()->has('aviso'))
                    <h2 class=" text-danger">{{session('aviso')}}</h2>
                 @endif
            </div>
        </div>
        <!-- Form de adicionar os itens no carrinho -->

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

    <!-- Carrinho com os itens -->
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

    <!-- Footer -->
    <div class="container">
        <div class="row rounded border shadow mt-2">
            <div class="col">
                Valor total: R${{session('valorfinaldacompra')??0}}
                </div>
            <button onclick="mostrartela(1)"class="btn btn-primary col">Concluir venda</button>
        </div>
    </div>
    
    <!-- Confirmação do pagamento -->

    <form action="{{route('vendas.store')}}" method="post">
        @csrf
        <div id="confirmar" class="container rounded shadow border p-3 bg-light text-center translate-middle position-absolute top-50">
            <div class="row border p-2">
                <h2>Valor Final:R$ {{session('valorfinaldacompra')??0}}</h2>
                <h3>Forma de pagamento</h3>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <label class=" btn btn-primary" for="pix">PIX</label> <br>
                    <input onfocus="liberarConfirmar()" value="pix" type="radio" name="forma" id="pix">
                </div>
                <div class="col">
                    <label class=" btn btn-primary" for="debito">Débito</label><br>
                    <input onfocus="liberarConfirmar()" value="debito" type="radio" name="forma" id="debito">
                </div>
                <div class="col">
                    <label class=" btn btn-primary" for="credito">Crédito</label><br>
                    <input onfocus="liberarConfirmar()" value="credito" type="radio" name="forma" id="credito">
                </div>
                <div class="col">
                    <label class=" btn btn-primary" for="especie">Espécie</label><br>
                    <input onfocus="liberarConfirmar()" value="dinheiro" type="radio" name="forma" id="especie">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <input type="submit" id="btnconfirmar" disabled {{session('liberarbtnconfirmar')?'':'disabled'}} value="Confirmar" class="btn btn-success">
                </div>
                <div class="col">
                    <button onclick="mostrartela(0)" type="button" class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </div>
    </form>



    <script>
        function mostrartela(acao){
            let div = document.getElementById('confirmar');
            if(acao==1){
            div.style.left = "50%";
            }
            else{
            div.style.left = "-50%";
            }
        }

        function liberarConfirmar(){
            let input = document.getElementById('btnconfirmar');
            input.disabled=false;
        }
    </script>
</body>
</html>