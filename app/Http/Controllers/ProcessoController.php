<?php

namespace App\Http\Controllers;

use App\Models\Processo;
use Illuminate\Http\Request;

class ProcessoController extends Controller
{

    public function tratamento(){
        return view('processos.tratamento_excepcional');
    }
    public function SolicitarTratamentoExcepcional(Request $request){
        $tratamento = 'Tratamento.'. $request->doc_tratamento->extension();
        $pdf = $request->doc_tratamento->storeAs('/arquivostest', $tratamento);
        $processo = new Processo();
        $processo->doc_tratamento = $pdf;
        $processo->user_id = 2;
        $processo->save();

        return 'Deu tudo certo';
        
        

    }
    public funcion tratamentoform(Request $request){

    }
}
