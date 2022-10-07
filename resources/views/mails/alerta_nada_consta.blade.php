<div class="row justify-content-center">
    <div class="col-sm-12" align="center">
        <a target="_blank" href="http://ufape.edu.br/">
            <img src="{{asset('/images/logo_ufape_blue_email.png')}}" style="height: 80px">
        </a>
    </div>
</div>
@if($status == "Concluido")


    <div class="container" style="background-color:white">
        {{-- DEFERIMENTO --}}
        <p><font face="Times New Roman" font size="4" color="black">Olá, {{$discente}}! </font></p>

        <p><font face="Times New Roman" font size="4" color="black">A declaração de nada consta <strong>ESTÁ
                    DISPONÍVEL PARA RETIRADA! </strong> </font></p>

        <p><font face="Times New Roman" font size="4" color="black">Acesse o <a target="_blank"
                                                                                href="{{route('home')}}">Solicita</a>
                para ter acesso a declaração.</font></p>
        <p></p>
        <p align="center"><font face="Times New Roman" font size="4" color="black">Atenciosamente, </font></p>

        <p align="center" style=""><font face="Times New Roman" font size="4" color="black"> <strong>
                    Universidade Federal do Agreste de Pernambuco<br>
                    SIB-UFAPE</strong></font></p>
    </div>
@else
    <div class="container" style="background-color:white">
        {{-- Indeferimento --}}
        <p><font face="Times New Roman" font size="4" color="black">Prezado, {{$discente}}, </font></p>

        <p><font face="Times New Roman" font size="4" color="black">Consta(m) pendência(s) com a biblioteca em seu nome. Por favor, entre em contato com o setor. </font></p>
        </p>
        <p></p>
        <p align="center"><font face="Times New Roman" font size="4" color="black">Atenciosamente, </font></p>

        <p align="center" style=""><font face="Times New Roman" font size="4" color="black"> <strong> Universidade
                    Federal do Agreste de Pernambuco<br>
                    SIB-UFAPE</strong></font></p>
    </div>
@endif



