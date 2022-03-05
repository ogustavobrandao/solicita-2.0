<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Biblioteca;
use App\Models\Bibliotecario;
use App\Models\Dissertacao;
use App\Models\FichaCatalografica;
use App\Models\Monografia;
use App\Models\PalavraChave;
use App\Models\Perfil;
use App\Models\ProgramaEducacional;
use App\Models\Requisicao;
use App\Models\Requisicao_documento;
use App\Models\Tcc;
use App\Models\Tese;
use App\Models\TipoDocumento;
use App\Models\Unidade;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BibliotecarioController extends Controller
{
    // Redireciona para tela de login ao entrar no sistema
    public function index()
    {

        // return view('autenticacao.home-aluno');
        if (Auth::user()) {
            return redirect()->route('home');
        }
        return view('autenticacao.login');
    }

    public function listarSolicitacoes()
    {
        $requisicaos = Requisicao_documento::all();
        $idUser = Auth::user()->id;
        $bibliotecario = Bibliotecario::where('user_id', $idUser)->first();
        $unidadeBibliotecario = $bibliotecario->biblioteca->unidade_id;
        $fichas = [];
        $requisicoesFichas = [];
        foreach ($requisicaos as $requisicao) {
            $perfil = $requisicao->aluno->perfil->first();
            if ($requisicao->ficha_catalografica_id != null && $unidadeBibliotecario == $perfil->unidade_id) {
                $requisicoesFichas[] = $requisicao;
                $fichas[] = FichaCatalografica::find($requisicao->ficha_catalografica_id);
            }
        }

        return view('telas_bibliotecario.listar_documentos_solicitados', compact('requisicoesFichas', 'fichas','idUser'));
    }

    public function editarFicha($requisicaoId)
    {
        $requisicao = Requisicao_documento::where('id', $requisicaoId)->first();
        $aluno = Aluno::where('id', $requisicao->aluno_id)->first();
        $palavrasChave = PalavraChave::where('ficha_catalografica_id', $requisicao->ficha_catalografica_id)->Get();
        $fichaCatalografica = FichaCatalografica::where('id', $requisicao->ficha_catalografica_id)->first();
        $tipo_documento = $fichaCatalografica->tipo_documento_id;
        $documentoEspecificoNome = TipoDocumento::where('id', $tipo_documento)->first()->tipo;
        $bibliotecario = Bibliotecario::find($requisicao->bibliotecario_id);
        if($documentoEspecificoNome == 'Monografia')
            $documento = Monografia::where('ficha_catalografica_id', $fichaCatalografica->id)->first();
        elseif ($documentoEspecificoNome == 'Tese')
            $documento = Tese::where('ficha_catalografica_id', $fichaCatalografica->id)->first();
        elseif ($documentoEspecificoNome == 'TCC')
            $documento = Tcc::where('ficha_catalografica_id', $fichaCatalografica->id)->first();
        elseif ($documentoEspecificoNome == 'ProgramaEduc')
            $documento = ProgramaEducacional::where('ficha_catalografica_id', $fichaCatalografica->id)->first();
        else
            $documento = Dissertacao::where('ficha_catalografica_id', $fichaCatalografica->id)->first();
        return view('telas_bibliotecario.editar_ficha', compact('documento', 'aluno', 'palavrasChave', 'fichaCatalografica', 'tipo_documento','requisicao', 'bibliotecario'));
    }

    public function atualizarFicha(Request $request)
    {

        $ficha = FichaCatalografica::find($request->ficha_catalografica_id);
        $ficha->autor_nome = $request->autor_sobrenome;
        $ficha->autor_sobrenome = $request->autor_sobrenome;
        if($ficha-> cutter == null)
            $ficha->cutter = $request->cutter;
        if($ficha->classificacao == null)
            $ficha->classificacao = $request->classificacao;
        $ficha->titulo = $request->titulo;
        $ficha->subtitulo = $request->subtitulo;
        $ficha->local = $request->local;
        $ficha->ano = $request->ano;
        $ficha->folhas = $request->folhas;
        $ficha->ilustracao = $request->ilustracao;
        $ficha->update();



        if ($request->tipo_documento == 1) {
            $monografia = Monografia::where('ficha_catalografica_id', $request->ficha_catalografica_id)->first();
            $monografia->orientador = $request->orientador;
            $monografia->coorientador = $request->coorientador;
            $monografia->titulacao_orientador = $request->titulacao_orientador;
            $monografia->titulacao_coorientador = $request->titulacao_coorientador;
            $monografia->curso = $request->curso;
            $monografia->campus = $request->campus;
            $monografia->update();
        } elseif ($request->tipo_documento == 2) {
            $tese = Tese::where('ficha_catalografica_id', $request->ficha_catalografica_id)->first();
            $tese->orientador = $request->orientador;
            $tese->coorientador = $request->coorientador;
            $tese->titulacao_orientador = $request->titulacao_orientador;
            $tese->titulacao_coorientador = $request->titulacao_coorientador;
            $tese->programa = $request->programa;
            $tese->update();
        } elseif ($request->tipo_documento == 3) {
            $tcc = Tcc::where('ficha_catalografica_id', $request->ficha_catalografica_id)->first();
            $tcc->orientador = $request->orientador;
            $tcc->coorientador = $request->coorientador;
            $tcc->titulacao_orientador = $request->titulacao_orientador;
            $tcc->titulacao_coorientador = $request->titulacao_coorientador;
            $tcc->campus = $request->campus;
            $tcc->curso = $request->curso;
            $tcc->referencia = $request->referencia;
            $tcc->update();
        } elseif ($request->tipo_documento == 4) {
            $programaEduc = ProgramaEducacional::where('ficha_catalografica_id', $request->ficha_catalografica_id)->first();
            $programaEduc->programa = $request->programa;
            $programaEduc->campus = $request->campus;
            $programaEduc->update();
        } elseif ($request->tipo_documento == 5) {
            $dissertacao = Dissertacao::where('ficha_catalografica_id', $request->ficha_catalografica_id)->first();
            $dissertacao->orientador = $request->orientador;
            $dissertacao->coorientador = $request->coorientador;
            $dissertacao->titulacao_orientador = $request->titulacao_orientador;
            $dissertacao->titulacao_coorientador = $request->titulacao_coorientador;
            $dissertacao->campus = $request->campus;
            $dissertacao->programa = $request->programa;
            $dissertacao->update();
        }else {
            dd($request);
        }

        $palavra = PalavraChave::where('id',$request->palavra_chave1_id)->first();
        $palavra->palavra = $request->primeira_chave;
        $palavra->update();

        $palavra = PalavraChave::where('id',$request->palavra_chave2_id)->first();
        $palavra->palavra = $request->segunda_chave;
        $palavra->update();

        $palavra = PalavraChave::where('id',$request->palavra_chave3_id)->first();
        $palavra->palavra = $request->terceira_chave;
        $palavra->update();

        if ($request->quarta_chave != null) {
            $palavra = PalavraChave::where('id',$request->palavra_chave4_id)->first();
            $palavra->palavra = $request->quarta_chave;
            $palavra->update();
        }
        if ($request->quinta_chave != null) {
            $palavra = PalavraChave::where('id',$request->palavra_chave5_id)->first();
            $palavra->palavra = $request->quinta_chave;
            $palavra->update();
        }

        $userId = Auth::user()->id;
        $bibliotecario = Bibliotecario::where('user_id',$userId)->first();


        $documentosRequisitados = Requisicao_documento::where('ficha_catalografica_id', $request->ficha_catalografica_id)->first();
        $documentosRequisitados->status = 'Concluido';
        $documentosRequisitados->updated_at = time();
        $documentosRequisitados->bibliotecario_id = $bibliotecario->id;
        $documentosRequisitados->update();

        return redirect(Route('gerar-ficha',$documentosRequisitados->id));
    }

    public function rejeitarFicha($requisicaoId) {
        $requisicao = Requisicao_documento::find($requisicaoId);
        $ficha = FichaCatalografica::find($requisicao->ficha_catalografica_id);
        $aluno = Aluno::find($requisicao->aluno_id);
        $usuario = User::find($aluno->user_id);

        return view('telas_bibliotecario.rejeitar_ficha', compact('ficha','usuario','requisicao'));
    }

    public function atualizarRejeicao($requisicaoId, Request $request){


        $requisicao = Requisicao_documento::find($requisicaoId);
        $requisicao->anotacoes = $request->mensagem;
        $requisicao->status = 'Rejeitado';
        $requisicao->updated_at = time();
        $idUser = Auth::user()->id;
        $bibliotecario = Bibliotecario::where('user_id',$idUser)->first();
        $requisicao->bibliotecario_id = $bibliotecario->id;

        $requisicao->update();
        return redirect(Route('listar-fichas'));
    }

    public function gerarFicha($requisicaoId) {
        $requisicao = Requisicao_documento::find($requisicaoId);
        if($requisicao->status != 'Concluido'){ return redirect('home')->with('error', 'Ficha não concluida.'); }
        $ficha = FichaCatalografica::find($requisicao->ficha_catalografica_id);
        $palavras = PalavraChave::Where('ficha_catalografica_id', $ficha->id)->get();
        $tipo_documento= TipoDocumento::find($ficha->tipo_documento_id)->tipo;
        $bibliotecario = Bibliotecario::find($requisicao->bibliotecario_id);
        $userBibliotecario = User::find($bibliotecario->user_id);
        $biblioteca = Biblioteca::find($bibliotecario->biblioteca_id);
        $unidade = Unidade::find($biblioteca->unidade_id);

        if($tipo_documento == 'Monografia')
            $documento = Monografia::where('ficha_catalografica_id', $ficha->id)->first();
        elseif ($tipo_documento == 'Tese')
            $documento = Tese::where('ficha_catalografica_id', $ficha->id)->first();
        elseif ($tipo_documento == 'TCC')
            $documento = Tcc::where('ficha_catalografica_id', $ficha->id)->first();
        elseif ($tipo_documento == 'ProgramaEduc')
            $documento = ProgramaEducacional::where('ficha_catalografica_id', $ficha->id)->first();
        else
            $documento = Dissertacao::where('ficha_catalografica_id', $ficha->id)->first();

        $pdf = Pdf::loadView('telas_bibliotecario.gerar_ficha',compact('ficha','palavras', 'tipo_documento','documento', 'bibliotecario', 'unidade', 'userBibliotecario'));
        return $pdf->download($ficha->titulo . "_" . $ficha->autor . strtotime('now').".pdf");
    }

    public function baixarAnexo($requisicaoId) {

        $requsicao = Requisicao_documento::find($requisicaoId);
        $ficha = FichaCatalografica::find($requsicao->ficha_catalografica_id);
        return Storage::download('fichas/'.$ficha->anexo);
    }

    public function createBibliotecario()
    {
        $bibliotecas = Biblioteca::All();
        return view('autenticacao.cadastro-bibliotecario', compact('bibliotecas'));
    }

    public function perfil()
    {
        $idUser = Auth::user()->id;
        $user = User::find($idUser); //Usuário Autenticado
        $bibliotecario = Bibliotecario::where('user_id', $idUser)->first(); //Bibliotecario autenticado
        $biblioteca = Biblioteca::where('id', $bibliotecario->biblioteca_id)->first();
        return view('telas_bibliotecario.perfil_bibliotecario', ['user' => $user,
            'bibliotecario' => $bibliotecario, 'biblioteca' => $biblioteca]);

    }


    public function storeBibliotecario(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'matricula' => 'required|unique:bibliotecarios|numeric|digits_between:1,10',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'biblioteca' => 'required',
        ]);
        $usuario = new User();
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->tipo = 'bibliotecario';
        $usuario->save();

        // biblioteca
        $biblioteca = Biblioteca::where('id', $request->bibliotecas)->first();
        //INSTANCIA DO BIBLIOTECARIO
        $bibliotecario = new Bibliotecario();
        $bibliotecario->matricula = $request->input('matricula');
        $bibliotecario->user_id = $usuario->id;
        $bibliotecario->biblioteca_id = $request->input('biblioteca');
        $bibliotecario->crb = $request->crb;
        $bibliotecario->save();
        $usuario->sendEmailVerificationNotification();
        return redirect()->route('home')->with('success', 'Bibliotecario cadastrado com sucesso!');
    }

    public function editarBibliotecario()
    {
        $idUser = Auth::user()->id;
        $user = User::find($idUser); //Usuário Autenticado
        $bibliotecario = Bibliotecario::where('user_id', $idUser)->first(); //Bibliotecario autenticado
        return view('telas_bibliotecario.editar_bibliotecario', ['user' => $user,
            'bibliotecario' => $bibliotecario]);
    }

    public function atualizarBibliotecario(Request $request)
    {
        //atualização dos dados
        $user = Auth::user();
        if ($user->email != $request->email) {
            $request->validate([
                'email' => ['bail', 'required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        //dados para ser exibido na view
        $idUser = Auth::user()->id;
        $user = User::find($idUser); //Usuário Autenticado
        return redirect()->route('home-bibliotecario')
            ->with('success', 'Seus dados foram atualizados!');
    }

    public function editarSenha()
    {
        return view('telas_bibliotecario.alterar_senha_bibliotecario');
    }

    public function atualizarSenha(Request $request)
    {
        if (!Hash::check($request->atual, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Senha atual está incorreta');
        }
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            // 'atual' => 'required|string|min:8',
        ]);
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('perfil-bibliotecario')
            ->with('success', 'Senha alterada com sucesso!');

    }


}


