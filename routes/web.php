<?php

use App\Http\Controllers\PaginasController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\VendasController;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('index');
});

Route::get('/vender', [VendasController::class, 'exibirTela'])->name('vendas.exibirtela');
Route::post('/vender/addcarrinho', [VendasController::class, 'addCarrinho'])->name('vendas.addcarrinho');
Route::post('/vender/limparcarrinho', [VendasController::class, 'limparCarrinho'])->name('vendas.limparcarrinho');
Route::post('/vender/confirmarvenda',[VendasController::class, 'store'])->name('vendas.store');
Route::post('/vender/remover/{id}', [VendasController::class, 'removerDoCarrinho'])->name('vendas.removerdocarrinho');
Route::get('/vervendas', [VendasController::class, 'index'])->name('vendas.index');



Route::get('/estoque', [ProdutosController::class, 'index'])->name('produtos.index');
Route::delete('/estoque/{produto}', [ProdutosController::class, 'destroy'])->name('produtos.destroy');
Route::get('/estoque/{id}', [ProdutosController::class, 'show'])->name('produtos.show');





Route::get('/cadastrarproduto', [ProdutosController::class, 'create'])->name('produtos.create');
Route::post('/cadastrarproduto', [ProdutosController::class, 'store'])->name('produtos.store');
