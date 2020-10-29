<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index(){
        try{
            $contato = Contato::getContatosRecentes(15);
  
            if(count($contato) > 0)
                $mensagem = "Contatos Recentes";
            else
                $mensagem = "Não há nada de novo!";

            return view('site.home', compact('contato', 'mensagem'));

        }catch(Exception $exception){
            Alert::error('Erro', 'O sistema está com algum problema. Tente novamente!');
            return back();
        }
    }
    
    public function show(Contato $id){
        return $id;
    }
}
