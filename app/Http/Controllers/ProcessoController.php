<?php

namespace App\Http\Controllers;

use App\Models\Processo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcessoController extends Controller
{

    public function tratamento(){
        $aluno = Auth::user()->aluno;
        $user = Auth::user();
        return view('processos.modelos_pdf.antecipacao_colacao_grau.antecipacao', compact('aluno', 'user'));
    }
    public function SolicitarTratamentoExcepcional(Request $request){
        
        $tratamento = 'Tratamento.'. $request->doc_tratamento->extension();
        $pdf = $request->doc_tratamento->storeAs('/arquivostest', $tratamento);
        $processo = new Processo();
        $processo->doc_tratamento = $pdf;
        $processo->user_id = 2;
        $processo->save();

        if($request->tipo_processo == 'excepcional'){
            
        }

        if($request->tipo_processo == 'alt_cadastral'){
            
        }

        if($request->tipo_processo == 'antecipacao'){
            
        }

        if($request->tipo_processo == 'complementar'){
            
        }

        if($request->tipo_processo == 'disciplina'){
            
        }

        if($request->tipo_processo == 'educacao_fisica'){
            
        }

        return 'Deu tudo certo';
        
        

    }
  
}
