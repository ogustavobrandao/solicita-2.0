@extends('layouts.app')

@section('conteudo')

<div class="container-fluid background-blue" style="">
    <div class="row justify-content-center">
        <div class="col-sm-3">

          <div class="card card-cadastro">
            <div class="card-body">
              <div class="row justify-content-center">
                  <h2>Editar Informações</h2>
              </div>

              <form action="#" method="POST">
                @csrf

                <div class="row justify-content-center">
                  <div class="col-sm-12">

                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-sm-12">

                  </div>
                </div>

                <!-- Botões -->
                <div class="form-group row justify-content-center" style="margin-top:60px">
                    <div class="col-sm-6">
                    <a class="btn btn-secondary btn-cadastro-primary " href="#" >Voltar</a>
                    </div>

                    <div class="col-sm-6">
                        <button type="submit" class="btn lmts-primary btn-cadastro-primary">
                            {{ __('Salvar') }}
                        </button>
                    </div>

                </div>


              </form>
            </div>
          </div>
        </div>
    </div>
</div>



@endsection
