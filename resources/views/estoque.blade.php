@extends('layouts.main')
@section('title', 'Estoque')
@section('content')

<style>
    p{
        color: white;

    }
    #caixaprincipal{
        background-color: gray;
        max-height: 70.9vh;
        overflow-y: scroll;

    }
    #telaaddproduto{
        min-height: 50vh;
        max-width: 50vw;
        left: -100%;
        transition: all 0.5s ease;

    }
</style>
    <div id="caixaprincipal" class=" container mt-1 text-center">
        <div class="row text-center p-1 sticky-top" style="background-color: gray">
            <p class="col">NOME</p>
            <p class="col">PREÇO</p>
            <p class="col">MARCA</p>
            <p class="col">QUANTIDADE</p>
            <div class="col">
                <button onclick="mostrarTela(1)" class="btn btn-primary">Adicionar produto</button>
            </div>

             <div class="row bg-success">
                <div class="col">
                    @if(session('msg'))
                        <p>{{session('msg')}}</p>
                    @endif
                </div>
            </div>

        </div>
        @foreach($produtos as $produto)
            <div class="border row">
                <p class="col ">{{$produto->nome}}</p>
                <p class="col">{{$produto->preco}}</p>
                <p class="col">{{$produto->marca}}</p>
                <p class="col ">{{$produto->quantidade}}</p>
                <div class="col text-center">
                        <i class="btn btn-danger m-3 col bi bi-x-octagon-fill"></i>
                        <i class="btn btn-success m-3 col bi bi-pencil"></i>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container position-absolute top-50 translate-middle  bg-light border text-center p-2 " id="telaaddproduto">
        <form action="{{route('Produtos.store')}}" method="post">
            @csrf
            <div class="row ">
                <div class="col">
                    <i onclick="mostrarTela(0)" class="btn btn-danger bi bi-box-arrow-left"></i>
                </div>
            </div>
            <div class="row g-0">
                <label for="nome" class="col m-1">Nome</label>
                <label for="preco" class="col m-1">Preço</label>
            </div>
            <div class="row g-0">
                <input type="text" class="col m-1" name="nome">
                <input type="number" step="0.01" class="col m-1" name="preco">
            </div>
            <div class="row g-0">
                <label for="marca" class="col m-1">Marca</label>
                <label for="qtd" class="col m-1">Quantidade</label>
            </div>
            <div class="row g-0">
                <input type="text" class="col m-1" name="marca">
                <input type="number" class="col m-1" name="qtd">
            </div>
            <div class="row">
                <div class="col  mt-3">
                    <button type="submit" class="btn btn-success">Confirmar</button>
                    <button type="button" class="btn btn-danger">Limpar</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function mostrarTela(acao){
            var div= document.getElementById('telaaddproduto');
            if(acao){
                div.style.left="50%";
            }
            else{
                div.style.left="-100%";
            }
        }
    </script>
@endsection