<?php

namespace App\Http\Middleware;

use App\Models\Aluno;
use App\Models\Requisicao_documento;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckFichaAluno
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $requisicao = Requisicao_documento::find($request->route()->parameter('requisicao_id'));
        $aluno = Aluno::where('user_id', Auth::user()->id)->first();

        if(empty($requisicao->aluno_id)){
            return redirect('listar-requisicoes-aluno')->with('error', 'Você não tem acesso para baixar esta ficha!');
        }
        if(Auth::user()->tipo == 'aluno' && $requisicao->aluno_id == $aluno->id){
            return $next($request);
        }

        else{
            return redirect('home')->with('error', 'Você não possui privilégios para acessar esta funcionalidade');
        }
    }
}
