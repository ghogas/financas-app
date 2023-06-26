<?php

namespace App\Http\Controllers;


//campos do formulário ário ário ário
use Illuminate\Http\Request;
//campos da tabela no banco de dados ados ados ados
use App\Models\Movimento;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class MovimentoController extends Controller
{
    //Escrever os métodos para o CRUD.

    //c do CRUD - CRIAR

    public function store(Request $request){
        //instância o Model Movimento
        $movimento = new Movimento; 
        
        $movimento->descricao = $request->descricao;
        $movimento->tipo = $request->tipo;
        $movimento->valor = $request->valor;
        $movimento->user_id = auth()->user()->id;
        
        //grava na tabela do BD, os dados do formulário
        $movimento->save();

        //redireciona para o dashboard oard oard
        return redirect('dashboard');

        // dd($request);
        // dd(auth()->user());
    }

    // r do CRUD - READ
    public function read(){
        $user = auth()->user()->id;
        //Carrega as despesas na variável
        //Select where
        $despesas = Movimento::where('tipo', 'Despesa')->where('user_id', $user)->get();
        //carrega receitas
        $receitas = Movimento::where('tipo', 'Receita')->where('user_id', $user)->get();

        $totDespesas = Movimento::where('tipo', 'Despesa')->where('user_id', $user)->sum('valor');
        $totReceitas = Movimento::where('tipo', 'Receita')->where('user_id', $user)->sum('valor');
        
        //carrega a VIEW passando os dados consultados
        $dados = [
            'despesas' => $despesas, 
            'receitas' => $receitas,
            'totDespesas' => $totDespesas,
            'totReceitas' => $totReceitas
        ];
        return view('dashboard', $dados);
    }
    

    // u do CRUD 1.1 - carrega dados
    public function form_update($id){
        $dado = Movimento::findOrFail($id);
        
        return view('form_update', ['dado' => $dado]);
    }
    //u do CRUD  1.2  - atualiza dados
    public function update(Request $request){
        Movimento::findOrFail($request->id) ->update($request->all( ));
        return redirect('dashboard');
    }

    //d do CRUD - deletar dados
    public function deletar($id){
        Movimento::FindOrFail($id)->delete();
        return redirect('dashboard');
    }

}
