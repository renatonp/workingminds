<?php
namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index(){
        $Cidades = Cidade::get();
        echo json_decode($Cidades);
    }

    public function store(Request $request){
        $id_estado=0;
        $estados = Estado::where('id','=',$request->id_estado_associado)->get();
        foreach($estados as $estado){
            $id_estado = $estado->id;
        }
        if($id_estado > 0){
            $Cidade = new Cidade();
            $Cidade->nome = $request->nome;
            $Cidade->id_estado_associado = $request->id_estado_associado;
            $Cidade->save();
            echo json_decode(['msg' => 'Registro salvo com sucesso.']);
        }
        else{
            echo json_decode(['msg' => 'Estado associado não-encontrado.']);
        }
    }

    public function update(Request $request){
        $id=0;
        $id_estado=0;
        if(isset($request->id)){
            $cidades = Cidade::where('id','=',$request->id)->get();
            foreach($cidades as $cidade){
                $id = $cidade->id;
            }
            if($id > 0){
                $estados = Estado::where('id','=',$request->id_estado_associado)->get();
                foreach($estados as $estado){
                    $id_estado = $estado->id;
                }
                if($id_estado > 0){
                    $cidades = Cidade::where('id','=',$request->id)->get();
                    $Cidade = Cidade::find($request->id);
                    $Cidade->nome = $request->nome;
                    $Cidade->id_estado_associado = $request->id_estado_associado;
                    $Cidade->save();
                    echo json_decode(['msg' => 'Registro atualizado com sucesso.']);
                }
                else{
                    echo json_decode(['msg' => 'Estado associado não-encontrado.']);
                }
            }
            else{
                echo json_decode(['msg' => 'Registro não-encontrado.']);
            }
        }
        else{
            echo json_decode(['msg' => 'Registro não-encontrado.']);
        }
    }

    public function delete(Request $request){
        $id=0;
        if(isset($request->id)){
            $cidades = Cidade::where('id','=',$request->id)->get();
            foreach($cidades as $cidade){
                $id = $cidade->id;
            }
            if($id > 0){
                $Cidade = Cidade::find($request->id);
                $Cidade->delete();
                echo json_decode(['msg' => 'Registro removido com sucesso.']);
            }
            else{
                echo json_decode(['msg' => 'Registro não-encontrado.']);
            }
        }
        else{
            echo json_decode(['msg' => 'Registro não-encontrado.']);
        }
    }
}
