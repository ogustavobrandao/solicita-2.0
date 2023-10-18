<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessoController extends Controller
{

    public function tratamento(){
        return view('processos.tratamento_excepcional');
    }
    public function SolicitarTratamentoExcepcional(Request $request){

    }
}
