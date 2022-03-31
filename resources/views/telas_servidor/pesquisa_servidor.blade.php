@extends('layouts.app')

@section('conteudo')

  <div class="container">

    <form action="{{  route('pesquisar-aluno-post')  }}" method="POST">
      @csrf
      <div class="form-row " >
        <div class="form-group col-md-6">
          <label for="formNome">Nome</label>
          <input type="text" class="form-control" onclick="clique();" name="formNome" value="" id="formNome" >
          <input type="checkbox" id="myCheck1" onclick="check1()">


        </div>
        <div class="form-group col-md-6">
          <label for="formCPF">CPF</label>
           <input type="text"  class="form-control" name="formCPF" value="" id="formCPF" >
           <input type="checkbox" id="myCheck2" onclick="check2()">

        </div>
      </div>

      <button type="submit" class="btn btn-primary ">Pesquisar</button>
    </form>
    <hr>

    <table class="table table-striped" id="table" >

      <thead class="lmts-primary table-borderless" style="border-color:#1B2E4F;" >
        <tr>
          <th scope="col" class="titleColumn" style="white-space:nowrap;">NOME</th>
          <th scope="col" class="titleColumn" style="white-space:nowrap;">CPF</th>
          <th scope="col" class="titleColumn" style="white-space:nowrap;">E-MAIL</th>
          <th scope="col" class="titleColumn" style="white-space:nowrap;">AÇÕES</th>

        </tr>
      </thead>
          <tbody>
@if(isset($alunos))
  @foreach($alunos as $aluno)
            <tr>
            <td>{{\App\Models\User::where('id',$aluno->user_id)->first()->name}}</td>
              <td>{{$aluno->cpf}}</td>
              <td>{{\App\Models\User::where('id',$aluno->user_id)->first()->email}}</td>
              <td>


                <form action="{{  route('listar-requisicoes-servidor', ['id'=> $aluno->id])  }}" method="GET">
                  @csrf
                  <button type="submit" class="btn btn-success">
                    Ver histórico
                  </button>
                </form>
              </td>
            </tr>
  @endforeach
@endif
          </tbody>
    </table>


  </div>

  {{--   INICIO DA TABELA DE RESULTADO --}}

  <script>

      $('#table').DataTable({
          searching: true,

          "language": {
              "lengthMenu": "Mostrar _MENU_ registros por página",
              "info": "Exibindo página _PAGE_ de _PAGES_",
              "infoEmpty": "Nenhum registro disponível",
              "zeroRecords": "Nenhum registro disponível",
              "search": "",
              "paginate": {
                  "previous": "Anterior",
                  "next": "Próximo",
              }
          },
          "dom": '<"top"f>rt<"bottom"p><"clear">',
          "order": [],
          "columnDefs": [{
              "targets": [2],
              "orderable": false
          }]
      });

      $('.dataTables_filter').addClass('here');
      $('.dataTables_filter').addClass('');
      $('.here').addClass('center');
      $('.here').removeClass('dataTables_filter');
      $('.table-hover').removeClass('dataTable');
      $('.here').find('input').addClass('search-input');
      $('.here').find('input').addClass('align-middle');
      $('.here').find('label').contents().unwrap();
      $('.here').find('input').wrap('<div class="col-md-12 my-3 py-1" style="background-color: #C2C2C2; border-radius: 1rem;"> <div class="col-md-7 my-2"> <div class="col-md-12 p-1 img-search" style="background-color: white; border-radius: 0.5rem;"> </div> </div> </div>');
      $('.img-search').prepend('<img src="{{asset('images/search.png')}}" width="25px">');

  </script>
@endsection
