<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index(){
        $funcionario = Funcionario::all();
        return view('page.funcionario', compact('funcionario'));
    }
    public function store(Request $request){
        $funcionario=null;

        if(isset($request->id)){
            $funcionario = Funcionario::find($request->id);
            $user = User::find($funcionario->users_id);
            $user->name = $request->nomeCompleto;
            $user->email = $request->email;
            $user->save();
        }else{
            $user = new User();
            $user->name = $request->nomeCompleto;
            $user->email = $request->email;
            $user->tipo = "Funcionario";
            $user->password =bcrypt("1234F");
            $user->save();
            $funcionario=new Funcionario();
            $funcionario->users_id = $user->id;
            }
            if(isset($request->imagem)){
                $imagem = $request->imagem;
                $extensao = $imagem->extension();//É mesmo necessário guardar a extensão?
                $imagemName = md5($imagem->getClientOriginalName() . time());
                $imagem->move(\public_path('img/carregadas'), $imagemName);
                $funcionario->imagem = $imagemName;
            }
            $funcionario->nAgente =$request->nAgente;
            $funcionario->nomeCompleto =$request->nomeCompleto;
            $funcionario->cargo =$request->cargo;
            $funcionario->categoria =$request->categoria;
            $funcionario->save();

            if ($funcionario){
                return redirect()->back()->with('successo', 'Cadastro realizado com sucesso!');   
            }else{
                return redirect()->back()->with('error', 'Erro  ao cadastrar o funcionário!');
            }
        }
        public function apagar($id){
        Funcionario::find($id)->delete();
        return redirect()->back();
         }
}
