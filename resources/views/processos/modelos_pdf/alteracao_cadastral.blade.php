<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 13pt;
            margin-left: 2cm;
            margin-right: 2cm;

        }
        header{
            text-align: center;
        }
        main{
            text-align: justify;
        }

        footer{
            text-align: justify;
        }

        h4{
            text-align: center;
        }

        address{
            display: inline;
        }
        img{
            width: 50.93px;
            height: 55.21px;
        }

    </style>
</head>
<body>
    <header>
        <div>
            <img src="{{public_path('images/Logo_gov.png')}}" >
        </div>
        <p>
            MINISTÉRIO DA EDUCAÇÃO <br>
            UNIVERSIDADE FEDERAL DO AGRESTE DE PERNAMBUCO
            <address>Av. Bom Pastor, s/n, Bairro Boa Vista CEP 55.292-278 Garanhuns, PE</address>
        </p>
    </header>
    <main>


        <h4>
            REQUERIMENTO DE ALTERAÇÃO CADASTRAL NO SIGA
        </h4>

        <p>Ao Departamento de Registro e Controle Acadêmico/UFAPE, </p>
        <p style="text-indent: 20px;">
            Eu <strong>{{$user->name}}</strong>, aluno(a) do curso de
            {{$perfil->curso->nome}}, venho por meio deste solicitar a alteração no cadastro do SIGA, conforme documento comprobatório anexo.

        </p>
        <p><strong>Motivo do requerimento: </strong> {{$request->motivo}}</p>
        <p>
            Garanhuns, {{$data}}
        </p>
        <p>
            Contatos: <br>
            Email: {{$user->email}}
        </p>

    </main>
    <footer>
        <p style="font-weight: italic">Obs.: Requerimento realizado pelo(a) discente através do Solicita <a href="www.solicita.ufape.edu.br">(www.solicita.ufape.edu.br)</a>, dispensa assinatura.</p>
    </footer>
</body>
</html>
