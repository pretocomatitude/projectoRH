<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index(){
        $funcionario = Funcionario::all();
        return view('page.funcionario', compact ('funcionario'));
    }
    public function store(Request $request){
        $funcionario = null;
        if(isset($request->id)){
            $funcionario = Funcionario::find($request->id);
            $user = User::find($funcionario->users_id);
            $user->email = $request->email;
            $user->name = $request->nomeCompleto;
            $user->save();
      }else{
        $user = new User();
        $user->name = $request->nomeCompleto;
        $user->email = $request->email;
        $user->password = bcrypt("12345");
        $user->tipo = "Funcionario";
        $user->save();
        $funcionario = new Funcionario();
        $funcionario->users_id = $user->id;
        }
        if(isset($request->imagem)){
            $imagem = $request->imagem;
            $extencao = $imagem->extension();
            $imagemNome = md5($imagem->getClientOriginalName().strtotime('now')).$extencao;
            $imagem->move(public_path('img/carregadas'),$imagemNome);
            $funcionario->imagem = $imagemNome; 
        }
        $funcionario->nome =$request->nome;
        $funcionario->nAgente =$request->nAgente;
        $funcionario->cargo =$request->cargo;
        $funcionario->categoria =$request-> categoria;
        $funcionario->save();
        if($funcionario){
        return redirect()->back()->with('Sucesso', 'Adicionado Com Sucesso');
        }else{
        return redirect()->back()->with('Error', 'Erro ao cadastrar o funcionario');
    }
}
public function apagar($id){
    Funcionario::find($id)->delete();
    return redirect()->back();
}
}
