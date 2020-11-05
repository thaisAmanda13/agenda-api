<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\Contato;
use Exception;


class ContatoController extends Controller
{
    private $contato;

    public function index(){
        $data = ['data'=> $this->contato->paginete(15)];
        $contato = json_encode($data);
        echo '$contato';
        return view('site.home',compact('contato'));
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
            // if(config('app.debug')){
                // return response()->json(ApiError::errorMessage($erro->getMessage(), 1010));
            // }
            // return response()->json(ApiError::errorMessage('Houve algum erro',1010));

        }        
    }
     
    public function update(Request $request, $id){

        try{

            $contatoData = $request->all();
            $contato = $this->contato->find($id);
            $contato->update($contatoData);

            return response()->json(['msg'=> 'Contato atualizado!'],201);
        }catch(Exception $erro){
            // if(config('app.debug')){
            //     // return response()->json(ApiError::errorMessage($e->getMessage(), 1011));
            // }
            // return response()->json(ApiError::errorMessage('Any error has ocurred',1011));
        }
    }
    public function delete(Contato $id){
        try{
            $id->delete();
            return response()->json(['data' => ['msg' => 'Contato: '.$id->nome. ' foi excluido']], 200);

        }catch(Exception $error){
            // if(config('app.debug')){
            //     return response()->json(ApiError::errorMessage($e->getMessage(), 1012));
            // }
            // return response()->json(ApiError::errorMessage('Any error has ocurred',1012));

        }
    }
}
