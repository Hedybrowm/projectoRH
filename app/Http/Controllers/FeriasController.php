<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ferias;
use App\Models\Funcionario;
use Auth;

class FeriasController extends Controller
{
    public function index(){
        $ferias = Ferias::all();
        return view('page.ferias', compact('ferias'));
    }
    public function store(Request $request){
        $ferias=null;

        if(isset($request->id)){
            $ferias = Ferias::find($request->id);
        }else{
            $ferias = new Ferias();     
        }
        $ferias->data_inicio = $request->data_inicio;
        $ferias->data_fim = $request->data_fim;
        $ferias->dias_ferias = $request->dias_ferias;
        $ferias->id_funcionario = $request->id_funcionario;
        $ferias->aprovado_por = Auth::user()->name;
        $ferias->estado = "Pendente";
        $ferias->save();
        return redirect()->back()->with('Successo', 'Férias cadastradas com sucesso!');
    }
        public function apagar($id){
            Funcionario::find($id)->delete();
            return redirect()->back();
         }

         public function aprovar($id){
            $ferias = Ferias::find($id);
            $ferias->estado = "Aprovado";
            $ferias->save();
            return redirect()->back();
        }
    
        public function recusar($id){
            $ferias = Ferias::find($id);
            $ferias->estado = "Recusado";
            $ferias->save();
            return redirect()->back();
        }
}
