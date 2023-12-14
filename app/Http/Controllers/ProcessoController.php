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

    public function main(){//Tela de escolha dos processos
        
        return view('processos.main');
    }

    public function antecipacao(){
        return view('processos.formularios.antecipacao_grau');
    }

    public function disciplina(){
        return view('processos.formularios.aproveitamento_disciplina');
    }

    public function complementar(){
        return view('processos.formularios.complementar');
    }

    public function educao(){
        return view('processos.formularios.educacao');
    }

    public function tratamento(){
        return view('processos.formularios.formulario_tratamento');

    }

  

  
    
    public function aberturaProcessos(Request $request){
        
        $processo = new Processo();
        $processo->user_id = Auth::user()->id;
        $processo->tipo
        $aluno = Auth::user()->aluno;
        $user = Auth::user();
        $perfil = Perfil::where('aluno_id', $aluno->id)->first();
        $perfil->curso->nome = strtoupper($perfil->curso->nome);
        $data = Carbon::now()->format('d/m/Y');
        $processo->save();
        dd($request);


        if($request->tipo_processo == 'excepcional'){
            $pdf = Pdf::loadView('processos.modelos_pdf.Atividade_complementar.complementar', compact('aluno', 'user', 'perfil', 'data'));
            Mail::mailer('escolaridade')->to('lmts@ufape.edu.br')->send(new ComplementarEmail($pdf, $request->doc_tratamento));

            return redirect(Route('tratamento.create'))->with('success', 'Solicitação realizada com sucesso!');;

        
            
        }
        
        if($request->tipo_processo == 'antecipacao'){
            
            $pdf = Pdf::loadView('processos.modelos_pdf.antecipacao_colacao_grau.antecipacao', compact('aluno', 'user', 'perfil', 'data', 'request'));
            Mail::mailer('escolaridade')->to('lmts@ufape.edu.br')->send(new ComplementarEmail($pdf, $request->doc_tratamento));
            
            return redirect(Route('tratamento.create'))->with('success', 'Solicitação realizada com sucesso!');
        }

        if($request->tipo_processo == 'alt_cadastral'){
            $pdf = Pdf::loadView('processos.modelos_pdf.Atividade_complementar.complementar', compact('aluno', 'user', 'perfil', 'data'));
            Mail::mailer('escolaridade')->to('lmts@ufape.edu.br')->send(new ComplementarEmail($pdf, $request->doc_tratamento));

            return redirect(Route('tratamento.create'))->with('success', 'Solicitação realizada com sucesso!');;

        }


        if($request->tipo_processo == 'complementar'){
            $pdf = Pdf::loadView('processos.modelos_pdf.Atividade_complementar.complementar', compact('aluno', 'user', 'perfil', 'data'));
            Mail::mailer('escolaridade')->to('lmts@ufape.edu.br')->send(new ComplementarEmail($pdf, $request->doc_tratamento));

            return redirect(Route('tratamento.create'))->with('success', 'Solicitação realizada com sucesso!');;

            
            
        }

        if($request->tipo_processo == 'educacao_fisica'){

            $pdf = Pdf::loadView('processos.modelos_pdf.Dispensa_educacao_fisica.educacao_fisica', compact(''));
            Mail::mailer('escolaridade')->to('lmts@ufape.edu.br')->send(new ComplementarEmail($pdf, $request->doc_tratamento));

            return redirect(Route('tratamento.create'))->with('success', 'Solicitação realizada com sucesso!');;

            
        }
       
        if($request->tipo_processo == 'disciplina'){
            
            $pdf = Pdf::loadView('processos.modelos_pdf.Dispensa_disciplina.disciplina', compact('aluno', 'user', 'perfil', 'data', 'request'));
            Mail::mailer('smtp')->to('lmts@ufape.edu.br')->send(new ComplementarEmail($pdf, $request->doc_tratamento));

            return redirect(Route('tratamento.create'))->with('success','Solicitação realizada com sucesso!');
            
        }

        
        
        

    }
  
}
