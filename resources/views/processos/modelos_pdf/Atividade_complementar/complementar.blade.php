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

    </style>
</head>
<body>
    <div>
        <div>
            <img src="'/images/Logo_gov.jpg'">
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
                REQUERIMENTO DE ANOTAÇÃO DE
                ATIVIDADE CURRICULAR
                COMPLEMENTAR
            </h2>
            
            À COORDENAÇÃO DO CURSO DE {{$perfil->curso->nome}} DA UFAPE, <br>
            Eu <strong>{{$user->name}}</strong>, n° de CPF <strong>{{$aluno->cpf}}</strong>, aluno(a) do curso de
            {{$perfil->curso->nome}}, solicito de V. Sa. a análise da
            documentação apresentada em anexo, a essa
            coordenação relativa às atividades complementares
            para cômputo e registro de carga horária pelo
            DRCA/UFAPE, de acordo com a resolução
            CONSU/UFAPE no 015/2020. Garanhuns, {{$data}}
            
            Contatos:
            Email: {{$user->email}}
        </p>
    </div>
    <div>
        <p id="footer">Obs.: Requerimento realizado pelo(a) discente através do Solicita <a href="www.solicita.ufape.edu.br">(www.solicita.ufape.edu.br)</a>, dispensa assinatura.</p>
    </div>
</body>
</html>
