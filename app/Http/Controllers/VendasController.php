<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Venda;
use Carbon\Carbon;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    public function exibirTela(){
        return view('vender');
               

    }
    public function addCarrinho(Request $request){
        if($request->input('id')!=""&&$request->input('qtd')!=""){
            $id = $request->input('id');
            $qtd = (int) $request->input('qtd');
            $produtoBuscado = Produto::find($id);
            //verifica se o produto buscado foi encontrado no bd
            if($produtoBuscado){
               $carrinho = session('carrinho', []);
                $valorfinaldacompra = session('valorfinaldacompra', 0);


               //verifica se o item ja esta no carrinho
               if(isset($carrinho[$id])){
                    // se sim incrementa
                    $carrinho[$id]['qtd']+=$qtd;
               }
               else{
                    //se nao adiciona
                    $carrinho[$id]=[
                        'produtobuscado'=>$produtoBuscado,
                        'qtd'=>$qtd
                    ];
               }
               //calculando valor final
               foreach($carrinho as $id=>$item){
                    $valorfinaldacompra += ($item['produtobuscado']->preco)*$item['qtd'];
               }
               //salvando o carrinho na seção
               session(['valorfinaldacompra' => $valorfinaldacompra]);
               session(['carrinho'=>$carrinho]);
               return redirect('vender');

 
            }
            else{
                return redirect('vender')->with('aviso', 'O produto não foi encontrado');
            }
            
        }
        else{
            return redirect('vender')->with('aviso', 'Um dos campos está inválido');
        }
    }

    public function removerDoCarrinho($id){
        $carrinho = session('carrinho', []);
        $valorfinaldacompra = 0;

        
        if(session()->has('carrinho')){
            unset($carrinho[$id]);
            session(['carrinho'=>$carrinho]);
            foreach($carrinho as $id=>$item){
                    $valorfinaldacompra += ($item['produtobuscado']->preco)*$item['qtd'];
            }
            session(['valorfinaldacompra'=>$valorfinaldacompra]);
        }
        return redirect()->route('vendas.exibirtela');
    }

    public function limparCarrinho(Request $request){
        if(session()->has('carrinho')){
            session()->forget('carrinho');
            session()->forget('valorfinaldacompra');
            session()->flush();
            return redirect('vender');

        }
        else{
            return redirect('vender')->with('aviso', 'O carrinho não possui itens');
        }
        

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendas = Venda::all();
        return view('vervendas', ['vendas'=>$vendas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $venda = new Venda();
        $venda->momento = Carbon::now();
        $venda->valor =(int) session('valorfinaldacompra');
        $venda->forma = $request->input('forma');
        if(
            $venda->momento!=""&&
            $venda->valor>0&&
            $venda->forma!=""
        ){
            $venda->save();
            session()->flush();
            return redirect('vender')->with('aviso', 'Venda realizada com sucesso');
        }
        else{
            return redirect('vender')->with('aviso', 'Complete todos os campos');

        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
