<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function AbrirMenu(){
        return view('index');
    }
    public function AbrirVenda(){
        return view('venda');
    }
}
