<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        @page {
            margin: 0;
        }
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 15px;
            line-height: 20px;
        }
        .header {
            margin-top: 1rem;
            text-align: center;
            font-weight: bold;
        }
        .header p {
            text-align: center;
            font-size: 14px;
            margin: 0;
            padding: 0;
        }
        .header .doc {
            margin-top: 3.5cm;
            text-decoration: underline;
            font-size: 18px;
        }
        .logo-ufape {
            height: 1.27in;
            margin-bottom: 5px;
        }
        .logo-sib {
            float: right;
            width: 2.35cm;
            height: 2.13cm;
        }
        .corpo {
            margin-left: 2.29cm;
            margin-top: 2.5cm;
            margin-right: 2.03cm;
            margin-bottom: 0.49cm;
            text-align: justify;
            text-indent: 50px;
        }
        .assinatura {
            margin-top: 5.5cm;
            display: flex;
            text-align: center;
            font-weight: bold;
        }
        .obs {
            text-indent: 0px;
            margin-top: 1cm;
        }
        #linha {
            margin: 0 25%;
            justify-content: center;
            display: flex;
            border-bottom: 1px black solid;
            margin-bottom: 3px;
        }
        .bg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.2;
            width: 11.95cm;
        }
        #cargo {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <img src="{{public_path('images/sib.png')}}" alt="" class="bg">
    <div class="header">
        <img class="logo-ufape" src="{{public_path('images/logo_ufape_principal.png')}}" alt="">
        <p>UNIVERSIDADE FEDERAL DO AGRESTE DE PERNAMBUCO</p>
        <p>REITORIA DA UFAPE</p>
        <p>SISTEMA INTEGRADO DE BIBLIOTECAS</p>
        <p>COORDENADORIA DE SERVIÇOS DIGITAIS</p>
        <p class="doc">DECLARAÇÃO DE NADA CONSTA</p>
    </div>
    <div class="corpo">
        Declaramos que o(a) Discente <strong>{{$discente}}</strong>, portador(a) do CPF <strong>{{$cpf}}</strong>, regularmente matriculado(a) no curso de <strong>{{$curso}}</strong> da <b>Universidade Federal do Agreste de Pernambuco - UFAPE</b> não possui débitos para com o Sistema Integrado de Bibliotecas.
        <div class="obs"><strong>Obs</strong>: Esta declaração não comprova que o(a) aluno(a) realizou o depósito do TCC, apenas que não tem outras pendências na biblioteca.</div>
    </div>
    <div class="assinatura">
        <div id="linha"></div>
        <span id="cargo">
            SIB/UFAPE
        </span>
    </div>
</body>

</html>
