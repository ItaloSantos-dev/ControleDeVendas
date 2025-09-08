@extends('layouts.main')
@section('title', 'Venda')
@section('content')
    <div class="container ">
        <form action="">
            @csrf
            <div class="row text-center">
                <label for="id" class="col">ID</label>
                <label for="quantidade" class="col">Quantidade</label>
                <div class="col">
                    <button class="btn btn-success">Finalizar compra</button>

                </div>
            </div>

            <div class="row mt-2">
                <input type="text" class="col" name="id">
                <input type="text" class="col" name="id">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary ">Adicionar</button>
                    <button class="btn btn-primary ">Limpar carrinho</button>
                </div>
            </div>
            
        </form>

    </div>
@endsection
