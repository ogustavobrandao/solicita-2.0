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

    <!-- Topo da ficha -->

    <p>Dados Internacionais de Catalogação na Publicação (CIP)<br></p>
    @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco<br></p> @else <p>Universidade Federal do Agreste de Pernambuco<br></p>@endif
    <p>Núcleo de Gestão de Bibliotecas e Documentação - NBID<br></p>
    <p>Elaborado por {{ $userBibliotecario->name }} {{ $bibliotecario->crb }}<br></p><br>

</div>
<div class="quadrado">
    <table style="font-family: 'Times New Roman', Times, serif; font-size: 12px;  margin-top: 15px">


    <tr>
        <td valign=top style="width: 15%"><br><span style="margin-left: 5px;">{{ $ficha->cutter}}</span></td>

        <td><table>
            <!-- Parte padrão -->
            <tr>
                <td>{{ $ficha->autor_sobrenome }}, {{ $ficha->autor_nome }}</td>
            </tr>
            <tr>
                <td>{{ $ficha->titulo }} @if($ficha->subtitulo != null): {{ $ficha->subtitulo }}@endif / {{ $ficha->autor}} – {{ $ficha->local }}, {{ $ficha->ano }}.</td>
            </tr>
            <tr>
                <td>{{ $ficha->folhas }}f : {{ $ficha->ilustracao }}</td>
            </tr>
            <tr><td> <br> </td></tr>


            <!-- Parte da Monografia -->            
            @if($tipo_documento == 'Monografia')
            <tr>
                <td>Orientador: {{ $documento->nome_orientador }} {{ $documento->sobrenome_orientador }} {{ $documento->titulacao_orientador }}</td>
            </tr>
            <tr>
                <td>@if($documento->nome_coorientador != null)Coorientador: {{ $documento->nome_coorientador }} {{ $documento->sobrenome_coorientador }} @endif {{ $documento->titulacao_coorientador }}</td>
            </tr>
            <tr>
                <td>Monografia (Mestrado) - {{ $documento->curso }}, @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif, {{ $unidade->nome }}, {{ $ficha->local }}-Pernambuco, {{ $ficha->ano }}.</td>
            </tr>

            <!-- Parte da tese -->
            @elseif($tipo_documento == 'Tese')
            <tr>
                <td>Orientador: {{ $documento->nome_orientador }} {{ $documento->sobrenome_orientador }} {{ $documento->titulacao_orientador }}</td>
            </tr>
            <tr>
                <td>@if($documento->nome_coorientador != null)Coorientador: {{ $documento->nome_coorientador }} {{ $documento->sobrenome_coorientador }} @endif {{ $documento->titulacao_coorientador }}</td>
            </tr>
            <tr>
                <td>Teses (Doutorado) - {{ $documento->programa }}, @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif, {{ $unidade->nome }}, {{ $ficha->local }}-Pernambuco, {{ $ficha->ano }}.</td>
            </tr>

            <!-- Parte do TCC -->
            @elseif($tipo_documento == 'TCC')
            <tr>
                <td>Orientador: {{ $documento->nome_orientador }} {{ $documento->sobrenome_orientador }} {{ $documento->titulacao_orientador }}</td>
            </tr>
            <tr>
                <td>@if($documento->nome_coorientador != null)Coorientador: {{ $documento->nome_coorientador }} {{ $documento->sobrenome_coorientador }} @endif {{ $documento->titulacao_coorientador }}</td>
            </tr>
            <tr>
                <td>TCC ( {{$documento->curso}} ) - @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif , {{ $unidade->nome }}, {{ $ficha->local }}-Pernambuco, {{ $ficha->ano }}. </td>
            </tr>
            <!-- <p>Referência: {{ $documento->referencia }}</p>
            <p>Campus: {{ $unidade->nome }}</p>
            <p>Curso: {{ $documento->curso }}</p> -->

            <!-- Parte do programa educacional -->
            @elseif($tipo_documento == 'ProgramaEduc')
            <tr>
                <td>{{ $documento->programa }} - @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif , {{ $unidade->nome }}, {{ $ficha->local }}-Pernambuco.  </td>
            </tr>
            <tr>
                <td>Orientador (a): {{ $documento->nome_orientador }} {{ $documento->sobrenome_orientador }}</td>
            </tr>
            <tr>
                <td>Coorientador (a): {{ $documento->nome_coorientador }} {{ $documento->sobrenome_coorientador }}</td>
            </tr>

            <!-- Parte da Dissertacao -->
            @else
            <tr>
                <td>Orientador: {{ $documento->nome_orientador }} {{ $documento->sobrenome_orientador }} {{ $documento->titulacao_orientador }}</td>
            </tr>
            <tr>
                <td>@if($documento->nome_coorientador != null)Coorientador: {{ $documento->nome_coorientador }} {{ $documento->sobrenome_coorientador }} @endif {{ $documento->titulacao_coorientador }}</td>
            </tr>
            <tr>
                <td>Dissertação (Mestrado) - {{ $documento->programa }}, @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif, {{ $unidade->nome }}, {{ $ficha->local }}-Pernambuco, {{ $ficha->ano }}.</td>
            </tr>
            <!--<p>Programa: {{ $documento->programa }}</p>
            <p>Campus: {{ $unidade->nome }}</p> -->
            @endif 

            <tr><td> <br> </td></tr>
            <!-- Palavras chave -->
            @if($tipo_documento == 'Monografia')
            <tr>
                <td>@for ($i = 0; $i < sizeof($palavras); $i++)
                {{ ($i + 1) }}. {{ $palavras[$i]->palavra }}
                @endfor I. {{ $documento->sobrenome_orientador }}, {{ $documento->nome_orientador }} II. {{ $documento->sobrenome_coorientador }}, {{ $documento->nome_coorientador }} III. @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif, {{ $unidade->nome }}, {{ $documento->curso }} IV. {{ $ficha->titulo }}</td>
                
            </tr>

            @elseif($tipo_documento == 'Tese')
            <tr>
                <td>@for ($i = 0; $i < sizeof($palavras); $i++)
                {{ ($i + 1) }}. {{ $palavras[$i]->palavra }}
                @endfor I. {{ $documento->sobrenome_orientador }}, {{ $documento->nome_orientador }} II. {{ $documento->sobrenome_coorientador }}, {{ $documento->nome_coorientador }} III. @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif, {{ $unidade->nome }}, {{ $documento->programa }} IV. {{ $ficha->titulo }}</td>
                
            </tr>

            @elseif($tipo_documento == 'TCC')
            <tr>
                <td>@for ($i = 0; $i < sizeof($palavras); $i++)
                {{ ($i + 1) }}. {{ $palavras[$i]->palavra }}
                @endfor I. @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif II. {{ $unidade->nome }} III. {{ $documento->curso }} IV. {{ $ficha->titulo }}</td>
                
            </tr>

            @elseif($tipo_documento == 'ProgramaEduc')
            <tr>
                <td>@for ($i = 0; $i < sizeof($palavras); $i++)
                {{ ($i + 1) }}. {{ $palavras[$i]->palavra }}
                @endfor I. {{ $documento->sobrenome_orientador }}, {{ $documento->nome_orientador }} II. {{ $documento->sobrenome_coorientador }}, {{ $documento->nome_coorientador }} III. @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif IV. {{ $ficha->titulo }}</td>
                
            </tr>

            @else
            <tr>
                <td>@for ($i = 0; $i < sizeof($palavras); $i++)
                {{ ($i + 1) }}. {{ $palavras[$i]->palavra }}
                @endfor I. {{ $documento->sobrenome_orientador }}, {{ $documento->nome_orientador }} II. {{ $documento->sobrenome_coorientador }}, {{ $documento->nome_coorientador }} III. @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif, {{ $unidade->nome }}, {{ $documento->programa }} IV. {{ $ficha->titulo }}</td>
                
            </tr>

            @endif

            <tr><td> <br> </td></tr>
            <!-- Parte do CDD -->
            <tr><td valign=bottom align=right><span style="margin-right: 5px;">CDD {{ $ficha->classificacao }}</span></td></tr>
        </table></td>

    </tr>

</table>


</body>
</html>
