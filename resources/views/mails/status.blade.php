@extends('layouts.app1')
@section('conteudo')
@if($documento->status=="Indeferido")
<div class="container" style="background-color:white">
    
  {{-- Indeferimento --}}
  <div class="row justify-content-center" style="margin-top:100px">
    <div class="col-sm-12" align="center">
        <a target="_blank" href="http://ww3.uag.ufrpe.br/">
            <img src="{{$message->embed(public_path() . '/images/logo_ufape_principal.png')}}" height="80px" >
        </a>
    </div>
  </div>
  
    <p><font face="Times New Roman" font size="4" color="black">Olá, {{$usuario->name}}! </font></p>
    
    <p><font face="Times New Roman" font size="4" color="black">A emissão do documento "{{$nome_documento}}" foi indeferida pelo seguinte motivo: <strong>{{$documento->anotacoes}}</strong> </font></p>

    <p><font face="Times New Roman" font size="4" color="black">Caso necessite de outras informações, entre em contato com o DRCA através do e-mail: cgrad.drca@ufape.edu.br.</font></p>
    <p></p>
    <p align="center" ><font face="Times New Roman" font size="4" color="black">Atenciosamente, </font></p>
    
    <p align="center" style=""><font face="Times New Roman" font size="4" color="black"> <strong> Departamento de Registro e Controle Acadêmico<br>
        Universidade Federal do Agreste de Pernambuco</strong></font></p>
  {{-- <div class="row justify-content-center">
      <div class="col-sm-12" align="center">
          <h1><strong>INDEFERIMENTO DE DOCUMENTO SOLICITADO!</strong> </h1>
      </div>
  </div>

  <div class="row justify-content-center" style="margin-top:50px">
      <div class="col-sm-12">
          <p><h3>Olá, <strong>{{$usuario->name}}!</strong></h3></p>
          <p><h4>O documento solicitado <strong>"{{$nome_documento}}"</strong> foi <span style="color:red">INDEFERIDO.</span></h4></p>
          <p><h4>Motivo: <strong>{{$documento->anotacoes}}</strong></h4></p>
      </div>
  </div>

  <div class="row justify-content-center" style="margin-top:20px">
      <div class="col-sm-12">
          <p><h4>Para outros esclarecimentos, entrar em contato com a escolaridade através do email: setor.escolar.uag@ufrpe.br</h4></p>
      </div>
  </div>

  <div class="row justify-content-center" style="margin-top:20px">
      <div class="col-sm-12">
          <p><h3>Atenciosamente, <strong>Setor de Escolaridade</strong>.</h3></p>
      </div>
  </div> --}}

  
@endif
@if($documento->status=="Concluído")
<div class="container" style="background-color:white" >
    <div class="row justify-content-center" style="margin-top:100px">
      <div class="col-sm-12" align="center">
          <a target="_blank" href="http://ww3.uag.ufrpe.br/">
              <img src="{{$message->embed(public_path() . '/images/logo_ufape_principal.png')}}" height="80px" >
          </a>
      </div>
    </div>
      {{-- DEFERIMENTO --}}
      <p><font face="Times New Roman" font size="4" color="black">Olá, {{$usuario->name}}! </font></p>
      
      <p><font face="Times New Roman" font size="4" color="black">O documento "{{$nome_documento}}" <strong>será enviado para o seu e-mail</strong>. Caso demore muito, verifique a sua caixa de <em>spam</em>. </font></p>

      <p><font face="Times New Roman" font size="4" color="black">Se não chegou, ou necessite de outras informações, entre em contato através do e-mail: cgrad.drca@ufape.edu.br.</font></p>
      <p></p>
      <p align="center" ><font face="Times New Roman" font size="4" color="black">Atenciosamente, </font></p>
      
      <p align="center" style=""><font face="Times New Roman" font size="4" color="black"> <strong> Departamento de Registro e Controle Acadêmico<br>
        Universidade Federal do Agreste de Pernambuco</strong></font></p>

  
</div>
@elseif ($documento->status== "Concluído - SIGA Desbloqueado")
<div class="container" style="background-color:white" >
    <div class="row justify-content-center" style="margin-top:100px">
      <div class="col-sm-12" align="center">
          <a target="_blank" href="http://ww3.uag.ufrpe.br/">
              <img src="{{$message->embed(public_path() . '/images/logo_ufape_principal.png')}}" height="80px" >
          </a>
      </div>
    </div>
      <p><font face="Times New Roman" font size="4" color="black">Olá!<br><br>
        Seu SIGA foi desbloqueado. Para gerar novas senhas, siga o seguinte passo a passo:<br><br>
        1- Acesse: http://www.siga.ufape.edu.br<br>
        2- Digite seu CPF (somente números, sem traços e pontos) no campo login e não informe senha<br>
        3- Clique no botão "solicitar acesso" (do lado esquerda da tela)<br>
        4- Confira o CPF e clique em continuar<br>
        5- Leia as instruções, siga o passo-a-passo e informe os dados solicitados e, por fim, crie as senhas.<br><br>
        --<br>
        At.te<br>
        Departamento de Registro e Controle Acadêmico<br>
        Universidade Federal do Agreste de Pernambuco-UFAPE</font></p>
@endif
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
