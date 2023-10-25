<?php

namespace App\Http\Controllers;

use App\Mail\ComplementarEmail;
use App\Models\Perfil;
use App\Models\Processo;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProcessoController extends Controller
{

    public function tratamento(){
        
        return view('processos.main');
    }

    public function complementar(){
        return view('processos.formularios.complementar');
    }

    public function educao(){
        return view('processos.formularios.educacao');
    }
    public function antecipacao(){
        return view('processos.formularios.antecipacao_grau');
    }

    public function forms(){
        $aluno = Auth::user()->aluno;
        $user = Auth::user();
        $perfil = Perfil::where('aluno_id', $aluno->id)->first();
        $data = Carbon::now()->format('d/m/Y');
        return view('processos.modelos_pdf.Atividade_complementar.complementar', compact('aluno', 'user', 'perfil', 'data'));
    }

    public function SolicitarTratamentoExcepcional(Request $request){
        
        $processo = new Processo();
        $processo->user_id = 2;
        $tipo_processo = 'complementar';
        $processo->tipo_processo = 'complementar';
        $aluno = Auth::user()->aluno;
        $user = Auth::user();
        $perfil = Perfil::where('aluno_id', $aluno->id)->first();
        $perfil->curso->nome = strtoupper($perfil->curso->nome);
        $data = Carbon::now()->format('d/m/Y');
        $processo->save();

        if($request->tipo_processo == 'excepcional'){
            
        }

        if($request->tipo_processo == 'alt_cadastral'){
            
        }

        if($tipo_processo == 'antecipacao'){
            
            $pdf = Pdf::loadView('processos.modelos_pdf.antecipacao_colacao_grau.antecipacao', compact('aluno', 'user', 'perfil', 'data', 'request'));
            Mail::mailer('escolaridade')->to('lmts@ufape.edu.br')->send(new ComplementarEmail($pdf, $request->doc_tratamento));
            return redirect(Route('tratamento.create'))->with('success', 'Solicitação realizada com sucesso!');
        }

        if($tipo_processo == 'complementar'){
            $pdf = Pdf::loadView('processos.modelos_pdf.Atividade_complementar.complementar', compact('aluno', 'user', 'perfil', 'data'));
            Mail::mailer('escolaridade')->to('lmts@ufape.edu.br')->send(new ComplementarEmail($pdf, $request->doc_tratamento));

            return redirect(Route('tratamento.create'))->with('success', 'Solicitação realizada com sucesso!');;

            
            
        }

        if($request->tipo_processo == 'disciplina'){
            
        }

        if($request->tipo_processo == 'educacao_fisica'){

            $pdf = Pdf::loadView('processos.modelos_pdf.Dispensa_educacao_fisica.educacao_fisica', compact(''));
            
        }
       
        
        
        

    }
  
}
