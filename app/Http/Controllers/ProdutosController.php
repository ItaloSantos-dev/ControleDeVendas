<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('estoque', ['produtos'=>$produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastrarproduto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(
            $request->input('nome')!="" &&
            $request->input('preco')!=""&&
            $request->input('marca')!=""&&
            $request->input('qtd')!=""
        ){
            $produto = new Produto();
            $produto->nome = $request->input('nome');
            $produto->preco = $request->input('preco');
            $produto->marca = $request->input('marca');
            $produto->quantidade = $request->input('qtd');
            $produto->descricao = $request->input('desc');
            //verifico se existe
            if ($request->hasFile('img')&&$request->file('img')->isvalid()){
                //pegar a img na request
                $requestimg = $request->file('img');
                //pegar extensao
                $extensao = $requestimg->extension();
                //renomear, hashmap md5 passando o nome da img e concatenando com o momento atual e a extensão do arquivo
                $novoNome = md5($requestimg->getClientOriginalName(). strtotime('now'). ".". $extensao);
                //baixa o arquivo em img-produtos, local de envio e nome
                $requestimg->move(public_path('img-produtos'), $novoNome);
                //guardadno o caminho da imagem no model
                $produto->imagem = "img-produtos/".$novoNome;

            }
            $produto->save();
        }
        return redirect('estoque');
        

        
        



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::find($id);
        return view('verproduto', ['produto'=>$produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        unlink($produto->imagem);
        $produto->delete();
        return redirect('estoque');
    }
}
