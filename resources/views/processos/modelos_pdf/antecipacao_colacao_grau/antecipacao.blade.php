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

        body{
            text-align: center;
            font-family: Calibri, 'Trebuchet MS', sans-serif; 
           
            
        }
        .conteudo{

        }
        p #footer{
            

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
    <div>
        <div>
            <img src="{{public_path('images/Logo_gov.png')}}">
        </div>
        <p>
            MINISTÉRIO DA EDUCAÇÃO <br>
            UNIVERSIDADE FEDERAL DO AGRESTE DE PERNAMBUCO
            <address>Av. Bom Pastor, s/n, Bairro Boa Vista CEP 55.292-278 Garanhuns, PE</address>
        </p>
    </div>
    <div class="conteudo">
        <p>
            
            <h2>
                REQUERIMENTO DE ANTECIPAÇÃO DE COLAÇÃO DE GRAU
            </h2>
            
            À REITORIA DA UFAPE, Eu, <strong>{{$user->name}}</strong>, nº de CPF {{$aluno->cpf}}, concluinte do Curso de {{$perfil->curso->nome}}, 
            desta Universidade, referente ao semestre {{$request->semestre_conclusao}}, 
            solicito Colação de Grau Antecipada, nos termos do Artigo 148, Parágrafo 2º do Regimento Geral da UFRPE, 
            pelo motivo abaixo especificado, conforme documentação comprobatória anexada a este Requerimento, pelo que assumo 
            total responsabilidade pela sua veracidade:
            Motivo do Requerimento: {{$request->motivo}}
            Garanhuns, {{$data}}
            
            Contatos:
            Email: {{$user->email}}
        </p>
    </div>
    <footer >
        <p id="footer">Obs.: Requerimento realizado pelo(a) discente através do Solicita <a href="www.solicita.ufape.edu.br">(www.solicita.ufape.edu.br)</a>, dispensa assinatura.</p>
    </footer>
</body>
</html>
