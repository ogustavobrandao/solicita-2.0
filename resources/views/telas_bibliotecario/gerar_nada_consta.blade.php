<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin-left: 3cm;
            margin-top: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }
        body {
            font-family: "Arial", sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            font-weight: bold;
        }
        .header div {
            text-align: center;
            margin-top: 1cm;
        }
        .logo-ufape {
            margin-top: 5px;
            float: left;
            width: 1.51cm;
            height: 1.98cm;
        }
        .logo-sib {
            float: right;
            width: 2.35cm;
            height: 2.13cm;
        }
        .corpo {
            text-align: justify;
            margin-top: 5rem;
        }
        .assinatura {
            margin-top: 2cm;
            width: 100%;
            display: flex;
            text-align: center;
        }
        #linha {
            border-bottom: 1px solid black;
            width: 40%;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="header">
        <img class="logo-ufape" src="{{asset('images/ufape_fundo_azul.png')}}" alt="">
        <img class="logo-sib" src="{{asset('images/sib.jpg')}}" alt="">
        <div>DECLARAÇÃO DE NADA CONSTA</div>
    </div>
    <div class="corpo"> Prezados,<br><br> Declaro, para os devidos fins, que o(a) discente: <strong>{{$discente}}</strong>, portador(a) do CPF: <strong>{{$cpf}}</strong>, do
        curso: <strong>{{$curso}}</strong>, não possui débitos para com essa biblioteca.<br><br> Ficamos à disposição para eventuais dúvidas. <br> <br>
        Atenciosamente, <br></div>
    <div class="assinatura">
        <div id="linha"></div>
        <div>{{$bibliotecario}}</div>
    </div>
</body>

</html>
