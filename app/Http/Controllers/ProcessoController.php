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

    public function menuProcessos(){//Tela de escolha dos processos

        return view('processos.menu');
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

    public function alteracao(){
        return view('processos.formularios.alter_cadastral');
    }

    public function aberturaProcessos(Request $request){

        Processo::create([
            'tipo_processo' => $request->tipo_processo,
            'user_id' => Auth::user()->id,

        ]);

        $aluno = Auth::user()->aluno;
        $user = Auth::user();
        $perfil = Perfil::where('aluno_id', $aluno->id)->first();
        $perfil->curso->nome = strtoupper($perfil->curso->nome);
        $data = Carbon::now()->isoFormat(' DD [de] MMMM [de] YYYY.');


        switch ($request->tipo_processo) {
            case 'excepcional':
                $pdf = Pdf::loadView('processos.modelos_pdf.complementar', compact('aluno', 'user', 'perfil', 'data'));
                // Mail::mailer('escolaridade')->to('lmts@ufape.edu.br')->send(new ComplementarEmail($request->requerimento, $request->doc_tratamento));
                break;
                // return redirect(Route('tratamento.create'))->with('success', 'Solicitação realizada com sucesso!');
            case 'antecipacao':
                $pdf = Pdf::loadView('processos.modelos_pdf.antecipacao', compact('aluno', 'user', 'perfil', 'data', 'request'));
                // Mail::mailer('escolaridade')->to('lmts@ufape.edu.br')->send(new ComplementarEmail($pdf, $request->doc_tratamento));
                break;
                // return redirect(Route('tratamento.create'))->with('success', 'Solicitação realizada com sucesso!');
            case 'alt_cadastral':
                $pdf = Pdf::loadView('processos.modelos_pdf.alteracao_cadastral', compact('aluno', 'user', 'perfil', 'data', 'request'));
                // Mail::mailer('escolaridade')->to('lmts@ufape.edu.br')->send(new ComplementarEmail($pdf, $request->doc_tratamento));
                break;
                // return redirect(Route('tratamento.create'))->with('success', 'Solicitação realizada com sucesso!');;
            case 'complementar':
                $pdf = Pdf::loadView('processos.modelos_pdf.complementar', compact('aluno', 'user', 'perfil', 'data'));
                // Mail::mailer('escolaridade')->to('lmts@ufape.edu.br')->send(new ComplementarEmail($pdf, $request->doc_tratamento));
                break;
                // return redirect(Route('tratamento.create'))->with('success', 'Solicitação realizada com sucesso!');;
            case 'educacao_fisica':
                $pdf = Pdf::loadView('processos.modelos_pdf.educacao_fisica', compact('aluno', 'user', 'perfil', 'data', 'request'));
                // Mail::mailer('escolaridade')->to('lmts@ufape.edu.br')->send(new ComplementarEmail($pdf, $request->doc_tratamento));
                break;
                // return redirect(Route('tratamento.create'))->with('success', 'Solicitação realizada com sucesso!');;
            case 'disciplina':
                $pdf = Pdf::loadView('processos.modelos_pdf.disciplina', compact('aluno', 'user', 'perfil', 'data', 'request'));
                // Mail::mailer('smtp')->to('lmts@ufape.edu.br')->send(new ComplementarEmail($pdf, $request->doc_tratamento));
                break;
                // return redirect(Route('tratamento.create'))->with('success','Solicitação realizada com sucesso!');

        }

        return $pdf->stream();
    }
}
