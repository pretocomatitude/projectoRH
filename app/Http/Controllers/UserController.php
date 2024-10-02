<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('page.usuario', compact ('users'));
    }
    public function store(Request $request){
        $user = null;
        if(isset($request->id)){
            $user = User::find($request->id);
      }else{
        $user = new User();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt("12345pca");
        $user->tipo = $request->tipo;
        $user->save();
        return redirect()->back();
}
public function apagar($id){
    User::find($id)->delete();
    return redirect()->back();
}
}
