@extends('layouts.app')

@section('conteudo')



  <div class="tabela-centro mx-auto" >

      <div class="row" style="margin-top: 20px">
          <div class="col-md-8">
              <h2 class="mt-1" > Lista de Alunos</h2>
          </div>
      </div>

      <table class="table table-hover" style=" background-color:#1B2E4F; color: white ">
          <thead>
          <tr>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col" style="width: 30%">Ações</th>
          </tr>
          </thead>
          <tbody>
          @foreach($usuarios as $usuario)
              <tr>
                  <td>{{ $usuario->name }}</td>
                  <td>{{ $usuario->email }}</td>
                  <td><a href="{{ route('editar-usuario', ['id_usuario' => $usuario->id]) }}">EDITAR</a></td>
              </tr>
          @endforeach

          </tbody>
      </table>

  </div>

@endsection
