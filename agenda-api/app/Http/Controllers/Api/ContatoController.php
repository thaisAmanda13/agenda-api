<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    private $contato;

    public function index(){
        $data = ['data'=> $this->contato->paginete(15)];
        return response()->json($data);

    }
    public function show(Contato $id){
        $data = ['data'=> $id];
        return response()->json($data);

    }

    public function store(Request $request){
        try{

            $contatoData = $request->all();
            $this->contato->create($contatoData);

            return response()->json(['msg'=>'Contato adicionado com sucesso!!', 201]);
        }catch(Exception $erro){
            // if(config('app.debug'))
        }
        
    }
}
