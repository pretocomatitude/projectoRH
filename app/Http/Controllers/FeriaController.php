<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\User;
use App\Models\Feria;
use Auth;
use Illuminate\Http\Request;

class FeriaController extends Controller
{
    public function index(){
        $feria = Feria::all();
        return view('page.feria', compact ('feria'));
    }
    public function store(Request $request){
        $feria = null;
        if(isset($request->id)){
            $feria = Feria::find($request->id);
      }else{
        $feria = new Feria();
         }
        $feria->data_inicio =$request->data_inicio;
        $feria->data_fim =$request->data_fim;
        $feria->funcionario_id =$request->funcionario_id;
        $feria->aprovado_por =Auth::user()->name;
        $feria->estado="Pendente";
        $feria->save();
        return redirect()->back()->with('Sucesso', 'Feria Aplicada com sucesso');
}
public function apagar($id){
    Feria::find($id)->delete();
    return redirect()->back();
}
public function aprovado($id){
    $feria = Feria::find($id)->delete();
    $feria->estado = "Aprovado";
    $feria->Save();
    return redirect()->back();
}
public function recusar($id){
    $feria = Feria::find($id);
    $feria->estado = "Recusado";
    $feria->Save();
    return redirect()->back();
}
}
