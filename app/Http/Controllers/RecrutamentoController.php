<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recrutamento;

class RecrutamentoController extends Controller
{
    public function index(){
        $recrutamentos = Recrutamento::all();
        return view('page.recrutamentos', compact('recrutamentos'));
    }
    public function store(Request $request){
        $recrutamentos=null;
        if(isset($request->id)){
            $recrutamentos=Recrutamento::find($request->id);
        }else{
            $recrutamentos=new Recrutamento();
        }
        $recrutamentos->categoria =$request->categoria;
        $recrutamentos->vaga =$request->vaga;
        $recrutamentos->datanascimento =$request->datanascimento;
        $recrutamentos->telefone =$request->telefone;
        $recrutamentos->email =$request->email;
        $recrutamentos->nbi =$request->nbi;
        $recrutamentos->genero =$request->genero;
        $recrutamentos->save();
        return redirect()->back();
    }
    public function apagar($id){
        Recrutamento::find($id)->delete();
        return redirect()->back();
    }
}
