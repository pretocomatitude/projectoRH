<?php

namespace App\Http\Controllers;

use App\Models\Recrutamento;
use Illuminate\Http\Request;

class RecrutamentoController extends Controller
{

 public function index()
    {
        $recrutamentos = Recrutamento::all();
        
  return view('page.recrutamento', compact('recrutamentos'));
    }

  public function store(Request $request)
    {
    
$request->validate([ 'nome' => 'required|string|max:255','categoria' => 'required|string|max:255','datanascimento' => 'required|date',  
'telefone' => 'required|string|unique:recrutamentos',   'nbi' => 'required|string|unique:recrutamentos',
'email' => 'required|email|unique:recrutamentos','genero' => 'required|in:Masculino,Feminino', ]);

$recrutamento = Recrutamento::updateOrCreate(
            ['id' => $request->id], 
            ['nome' => $request->nome, 'categoria' => $request->categoria,  'datanascimento' => $request->datanascimento,              
'telefone' => $request->telefone, 'nbi' => $request->nbi, 'email' => $request->email, 'genero' => $request->genero,
            ]); 
if ($recrutamento) {
            return redirect()->back()->with('Sucesso', 'Recrutamento salvo com sucesso!');
        } else {
return redirect()->back()->with('Error', 'Erro ao salvar o recrutamento.');
        }
    }

public function apagar($id)
    { 
$recrutamento = Recrutamento::find($id);
if ($recrutamento) {
            $recrutamento->delete();
return redirect()->back()->with('Sucesso', 'Recrutamento removido com sucesso!');
        } else {
return redirect()->back()->with('Error', 'Recrutamento não encontrado.');
        }
    }
}
 

   