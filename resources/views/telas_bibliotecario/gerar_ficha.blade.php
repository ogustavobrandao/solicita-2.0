<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ficha Catalográfica</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 3cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        p {
            margin: 0 !important;
            padding: 0;
            display: inline;
        }

        img {
            width: 3.66cm;
            height: 2.52cm;
            margin-left: 80px;
            margin-top: 0.4cm;
        }

        main {
            margin-top: 1.2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
        }

        h1 {
            font-size: 18px;
            text-align: center;
        }

        h2 {
            margin-left: 5px !important;
            font-size: 18px;
            margin-bottom: 0px;
            padding-bottom: 0px;
        }

        .pagenum:before {
            content: counter(page);
        }

        table {
            width: 100%;
            margin: 0px;
            padding: 0px;
        }

        tr {
            margin: 0px;
            padding: 0px;
        }

        td {
            margin: 0px;
            padding: 0px;
        }

        .page_break {
            page-break-before: always;
        }

        .centralizar {
            margin-left: auto;
            margin-right: auto;
        }

        .quadrado {
            border: 1px solid;
            width: 12.5cm;
            height: 7.5cm;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

</head>

<body>
<div style="font-family: 'Times New Roman', Times, serif; font-size: 12px; text-align: center;">
    
    <p>Dados Internacionais de Catalogação na Publicação (CIP)<br></p>
    <p>Universidade de Pernambuco (UPE)<br></p>
    <p>Núcleo de Gestão de Bibliotecas e Documentação (NBID)<br></p><br>
    
</div>
<div class="quadrado">
    <table style="font-family: 'Times New Roman', Times, serif; font-size: 12px;  margin-top: 15px">

    
    <tr>
        <td valign=top style="width: 15%"><br><span style="margin-left: 5px;">{{ $ficha->cutter}}</span></td>
               
        <td><table>

            <tr>
                <td>{{ $ficha->autor}}</td>
            </tr>
            <tr>
                <td>{{ $ficha->titulo }} : {{ $ficha->subtitulo }} / {{ $ficha->autor}} – {{ $ficha->local }}, {{ $ficha->ano }}.</td>   
            </tr>
            <tr>
                <td>{{ $ficha->folhas }} : {{ $ficha->ilustracao }}</td>
            </tr>
            <tr><td> <br> </td></tr>
            
            @if($tipo_documento == 'Monografia')
            <tr>
                <td>Orientador: {{ $documento->orientador }} {{ $documento->titulacao_orientador }}</td>
            </tr>
            <tr>
                <td>Coorientador: {{ $documento->coorientador }} {{ $documento->titulacao_coorientador }}</td>
            </tr>
            <tr>
                <td>Monografia () - Nome do Curso, Faculdade, Campus, {{ $ficha->local }}-Pernambuco, {{ $ficha->ano }}</td>
            </tr>

            @elseif($tipo_documento == 'Tese')
            <tr>
                <td>Orientador: {{ $documento->orientador }} {{ $documento->titulacao_orientador }}</td>
            </tr>
            <tr>
                <td>Coorientador: {{ $documento->coorientador }} {{ $documento->titulacao_coorientador }}</td>
            </tr>
            <p>Programa: {{ $documento->programa }}</p>

            @elseif($tipo_documento = 'TCC')
            <tr>
                <td>Orientador: {{ $documento->orientador }} {{ $documento->titulacao_orientador }}</td>
            </tr>
            <tr>
                <td>Coorientador: {{ $documento->coorientador }} {{ $documento->titulacao_coorientador }}</td>
            </tr>
            <p>Referência: {{ $documento->referencia }}</p>
            <p>Campus: {{ $documento->campus }}</p>
            <p>Curso: {{ $documento->curso }}</p>

            @elseif($tipo_documento = 'ProgramaEduc')
            <p>Programa: {{ $documento->programa }}</p>
            <p>Campus: {{ campus }}</p>

            @else
            <tr>
                <td>Orientador: {{ $documento->orientador }} {{ $documento->titulacao_orientador }}</td>
            </tr>
            <tr>
                <td>Coorientador: {{ $documento->coorientador }} {{ $documento->titulacao_coorientador }}</td>
            </tr>
            <p>Programa: {{ $documento->programa }}</p>
            <p>Campus: {{ $documento->campus }}</p>
            @endif

            <tr><td> <br> </td></tr>
            <tr>
                <td>1. @foreach($palavras as $palavra)
                Palavra-chave: {{ $palavra->palavra }}
                @endforeach I. {{ $documento->orientador }} II.{{ $documento->coorientador }} III. Universidade, campus, curso III. {{ $ficha->titulo }}</td>
                
            </tr>
            <tr><td> <br> </td></tr>
            <tr><td valign=bottom align=right><span style="margin-right: 5px;">CDD</span></td></tr>
        </table></td>
        
    </tr>
    
</table>

</div> 

    <h1>Titulo da ficha: {{ $ficha->titulo }}</h1>
    <h2>Ficha subtitulo: {{ $ficha->subtitulo }}</h2>
    <p>Cutter: {{ $ficha->cutter}}</p>
    <p>Classificação: {{ $ficha->classificacao }}</p>
    <p>Local: {{ $ficha->local }}</p>
    <p>Ano: {{ $ficha->ano }}</p>
    <p>Folhas: {{ $ficha->folhas }}</p>
    <p>Ilustração: {{ $ficha->ilustracao }}</p>
    <p>Autor: {{ $ficha->autor}}</p>
    @foreach($palavras as $palavra)
        <p>Palavras-chave: {{ $palavra->palavra }}</p>
    @endforeach
    @if($tipo_documento == 'Monografia')
        <p>Orientador: {{ $documento->orientador }}</p>
        <p>Titulo do orientador: {{ $documento->titulacao_orientador }}</p>
        <p>Coorientador: {{ $documento->coorientador }}</p>
        <p>Titulo do coorientador: {{ $documento->titulacao_coorientador }}</p>

    @elseif($tipo_documento == 'Tese')
        <p>Orientador: {{ $documento->orientador }}</p>
        <p>Titulo do orientador: {{ $documento->titulacao_orientador }}</p>
        <p>Coorientador: {{ $documento->coorientador }}</p>
        <p>Titulo do coorientador: {{ $documento->titulacao_coorientador }}</p>
        <p>Programa: {{ $documento->programa }}</p>

    @elseif($tipo_documento = 'TCC')
        <p>Orientador: {{ $documento->orientador }}</p>
        <p>Titulo do orientador: {{ $documento->titulacao_orientador }}</p>
        <p>Coorientador: {{ $documento->coorientador }}</p>
        <p>Titulo do coorientador: {{ $documento->titulacao_coorientador }}</p>
        <p>Referência: {{ $documento->referencia }}</p>
        <p>Campus: {{ $documento->campus }}</p>
        <p>Curso: {{ $documento->curso }}</p>

    @elseif($tipo_documento = 'ProgramaEduc')
        <p>Programa: {{ $documento->programa }}</p>
        <p>Campus: {{ campus }}</p>

    @else
        <p>Orientador: {{ $documento->orientador }}</p>
        <p>Titulo do orientador: {{ $documento->titulacao_orientador }}</p>
        <p>Coorientador: {{ $documento->coorientador }}</p>
        <p>Titulo do coorientador: {{ $documento->titulacao_coorientador }}</p>
        <p>Programa: {{ $documento->programa }}</p>
        <p>Campus: {{ $documento->campus }}</p>
    @endif
    <p>Tipo do documento: {{ $tipo_documento }}</p>
</body>
</html>
