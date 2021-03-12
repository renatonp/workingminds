<?php
namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function index(){
        $estados = Estado::get();
        echo json_decode($estados);
    }

    public function store(Request $request){
        $Estado = new Estado();
        $Estado->nome = $request->nome;
        $Estado->save();
        echo json_decode(['msg' => 'Registro salvo com sucesso.']);
    }

    public function update(Request $request){
        $id=0;
        if(isset($request->id)){
            $estados = Estado::where('id','=',$request->id)->get();
            foreach($estados as $estado){
                $id = $estado->id;
            }
            if($id > 0){
                $estado = Estado::find($request->id);
                $estado->nome = $request->nome;
                $estado->save();
                echo json_decode(['msg' => 'Registro atualizado com sucesso.']);
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
            $estados = Estado::where('id','=',$request->id)->get();
            foreach($estados as $estado){
                $id = $estado->id;
            }
            if($id > 0){
                $estado = Estado::find($request->id);
                $estado->delete();
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
