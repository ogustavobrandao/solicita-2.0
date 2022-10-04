<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;
use App\Models\Bibliotecario;
use App\Models\Servidor;
use Illuminate\Http\Request;

use App\Models\Curso;
use App\Models\Aluno;
use App\Models\User;
use App\Models\Perfil;
use App\Models\Unidade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Redireciona para tela de login ao entrar no sistema
    public function index()
    {
        return view('autenticacao.login');
    }

    public function listarAlunos()
    {
        $usuarios = User::where('tipo', 'aluno')->get();
        return view('telas_servidor.listar-alunos', compact('usuarios'));
    }

    //cadastro de aluno
    public function createAluno()
    {

        $cursos = Curso::all();
        $unidades = Unidade::all();

        return view('autenticacao.cadastro', compact('cursos', 'unidades')); //redireciona para view de cadastro do aluno
    }

    public function storeAluno(Request $request)
    {

        $regras = [
            'name' => 'required|string|max:255',
            //'cpf' => ['required','integer','size:11','unique:alunos'],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'vinculo' => ['required'],
            'unidade' => ['required'],
            'cursos' => ['required'],
        ];
        $mensagens = [
            'name.required' => 'Por favor, preencha este campo',
            'email.required' => 'Por favor, preencha este campo',
            'email.email' => 'Por favor, preencha um email válido',
            'vinculo.required' => 'Por favor, selecione o tipo de vínculo',
            'unidade.required' => 'Por favor, selecione a unidade acadêmica',
            'cursos.required' => 'Por favor, selecione o seu curso',
            'password.required' => 'Por favor, digite uma senha',
            'passowd.min' => 'Por favor, digite uma senha com, no mínimo, 8 dígitos',

        ];

        //$request->validate([$regras,$mensagens]);
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|cpf|unique:alunos',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'vinculo' => ['required'],
            'unidade' => ['required'],
            'cursos' => ['required'],
        ]);

        $usuario = new User();
        $aluno = new Aluno();
        $perfil = new Perfil();


        //USER
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->save();


        //ALUNO
        $aluno->cpf = $request->input('cpf');
        $aluno->user_id = $usuario->id;
        $aluno->save();

        //PERFIL
        //Default
        $curso = Curso::where('id', $request->cursos)->first();
        $perfil->default = $curso->nome; //Nome do Curso
        //Situacao
        $vinculo = $request->vinculo;
        if ($vinculo === "1") {
            $perfil->situacao = "Matriculado";
        } else if ($vinculo === "2") {
            $perfil->situacao = "Egresso";
        } else if ($vinculo === "3") {
            $perfil->situacao = "Especial";
        } else if ($vinculo === "4") {
            $perfil->situacao = "REMT - Regime Especial de Movimentação Temporária";
        } else if ($vinculo === "5") {
            $perfil->situacao = "Desistente";
        } else if ($vinculo === "6") {
            $perfil->situacao = "Trancado";
        } else if ($vinculo === "7") {
            $perfil->situacao = "Intercâmbio";
        }

        $unidade = Unidade::where('id', $request->unidade)->first();
        //aluno_id
        $perfil->aluno_id = $aluno->id;
        //unidade_id
        $perfil->unidade_id = $unidade->id;
        //curso_id
        $perfil->curso_id = $curso->id;
        $perfil->save();
        return redirect('/')->with('jsAlert', 'Usuário Cadastrado com sucesso.');
    }

    public function listarUsuario()
    {

        $usuarios = User::all();
        return view('telas_admin.listar-usuarios', compact('usuarios'));

    }

    public function editarUsuario(Request $request)
    {
        $usuario = User::where('id', $request->id_usuario)->first();

        $cursos = Curso::orderBy('nome')->get();
        $unidades = Unidade::orderBy('nome')->get();
        $situacoes = Perfil::SITUACAO_ENUM;
        // dd($unidades->first());

        switch ($usuario->tipo) {
            case "aluno":
                $usuarioEspecifico = Aluno::where('user_id', $usuario->id)->first();
                $perfil = Perfil::where([['aluno_id', $usuarioEspecifico->id], ['valor', true]])->first();
                $unidadeEspecifica = Unidade::where('id', $perfil->unidade_id)->first();
                $cursoEspecifico = Curso::where('id', $perfil->curso_id)->first();
                return view('telas_admin.editar-usuario', compact('usuario', 'usuarioEspecifico', 'perfil', 'cursoEspecifico', 'unidadeEspecifica', 'unidades', 'cursos', 'situacoes'));

            case "bibliotecario":
                $usuarioEspecifico = Bibliotecario::where('user_id', $usuario->id)->first();
                $bibliotecaEspecifica = Biblioteca::where('id', $usuarioEspecifico->biblioteca_id)->first();
                return view('telas_admin.editar-usuario', compact('usuario', 'usuarioEspecifico', 'bibliotecaEspecifica'));

            case "servidor":
                $usuarioEspecifico = Servidor::where('user_id', $usuario->id)->first();
                return view('telas_admin.editar-usuario', compact('usuario', 'usuarioEspecifico'));

            default:
                return view('telas_admin.editar-usuario', compact('usuario'));

        }


    }

    public function atualizarUsuario(Request $request)
    {

        $usuario = User::find($request->id_usuario);

        $validated = $request->validate([
            'name' => 'required|string|max:300',
            'email' => 'required|string|email|max:255',
            'cpf' => 'required|string|cpf',
        ]);

        if ($request->email != $usuario->email) {
            $userCheckEmail = User::where('email', 'ilike',$request->email)->first();
            if ($userCheckEmail != null) {
                return redirect()->back()->withErrors(['email' => 'Esse email já está sendo utilizado.'])->withInput($validated);
            }
        }

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->update();

        if ($usuario->aluno) {
            $aluno = $usuario->aluno;
            if ($request->cpf) {
                $aluno->cpf = $request->cpf;
                $aluno->update();
            }
            $unidade = Unidade::find($request->unidade);
            $curso = Curso::find($request->curso);
            $perfil = Perfil::where([['aluno_id', $aluno->id], ['valor', true]])->first();
            $perfil->update(['unidade_id' => $unidade->id, 'curso_id' => $curso->id, 'default' => $curso->nome, 'situacao' => $request->situacao]);
        }

        $user = Auth::user();

        switch ($usuario->tipo) {
            case "aluno":
                break;
            case "bibliotecario":
                break;
            case "servidor":
                break;
        }

        if ($user->tipo == "administrador") {
            return redirect()->route('listar-usuario')->with('success', 'O usuário foi atualizado!');
        } else {
            return redirect()->route('listar_alunos')->with('success', 'O usuário foi atualizado!');
        }

    }

}
