@extends('layouts.app1')
@section('conteudo')

    

<div class="container" style="background-color:white" >
    <div class="row justify-content-center" style="margin-top:100px">
      <div class="col-sm-12" align="center">
          <a target="_blank" href="http://ww3.uag.ufrpe.br/">
              <img src="{{$message->embed(public_path() . '/images/logo_ufape_principal.png')}}" height="80px" >
          </a>
      </div>
    </div>
      {{-- DEFERIMENTO --}}

      <p><font face="Times New Roman" font size="4" color="black">Documentos em anexo</font></p>
      <p></p>
      <p align="center" ><font face="Times New Roman" font size="4" color="black">Atenciosamente, </font></p>
      
      <p align="center" style=""><font face="Times New Roman" font size="4" color="black"> <strong> Departamento de Registro e Controle Acadêmico<br>
        Universidade Federal do Agreste de Pernambuco</strong></font></p>

  
</div>

<div class="row justify-content-center" style="background-color:white" align="center">
  <div class="col-sm-12">
      <div id="barra-logos" class="container">
          <ul id="logos" style="list-style:none;">
              <li style="margin-right:140px; margin-left:110px; border-right:1px ;height: 120px">
                  {{-- <a href="#">
                      <img src="{{$message->embed(public_path() . '/images/logo.png')}}"  style = "margin-left: 8px; margin-top:5px " height="70px" >
                  </a>
                  <img src="{{$message->embed(public_path() . '/images/separador.png')}}"  height="70px">
                  <a target="_blank" href="http://lmts.uag.ufrpe.br/">
                      <img src="{{$message->embed(public_path() . '/images/lmts.jpg')}}" height="70px">
                  </a>
                  <img src="{{$message->embed(public_path() . '/images/separador.png')}}"  height="70px">
                  <a target="_blank" href="http://www.ufrpe.br/">
                      <img src="{{$message->embed(public_path() . '/images/ufrpe.png')}}"  height="70px"  >
                  </a>
    
                  <img src="{{$message->embed(public_path() . '/images/separador.png')}}"  height="70px" >
                  <a target="_blank" href="http://ww3.uag.ufrpe.br/">
                      <img src="{{$message->embed(public_path() . '/images/logoUfapeAzul.png')}}" height="70px" >
                  </a> --}}
              </li>
          </ul>
        </div>
  </div>
</div>

</div>

@endsection
