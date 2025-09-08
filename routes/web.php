<?php

use App\Http\Controllers\PaginasController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PaginasController::class, 'AbrirMenu'])->name('menu');

Route::get('/estoque', [ProdutosController::class, 'index'])->name('estoque');
Route::post('/estoque',[ProdutosController::class, 'store'] )->name('Produtos.store');


Route::get('/venda',[PaginasController::class,'AbrirVenda'])->name('venda'); 





