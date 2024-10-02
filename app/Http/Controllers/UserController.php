<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('page.usuario', compact('users'));
    }
    public function store(Request $request){
        $user=null;
        if(isset($request->id)){
            $user=User::find($request->id);
        }else{
            $user=new User();
        }
        $user->name =$request->name;
        $user->email =$request->email;
        $user->tipo =$request->tipo;
        $user->password =bcrypt("1234F");
        $user->save();

        if ($user){
            return redirect()->back()->with('successo', 'Cadastro realizado com sucesso!');   
        }else{
            return redirect()->back()->with('error', 'Erro  ao cadastrar o funcionário!');
        }
        
    }
    public function apagar($id){
        User::find($id)->delete();
        return redirect()->back();
    }
}
