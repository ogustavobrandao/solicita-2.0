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

        .recuo {
            text-indent: 1.3em;
            text-align: justify;
        }

        .fixCDD {
            position: fixed;
            bottom: 0px;
        }

    </style>

</head>

<body>

<div style="font-family: 'Times New Roman', Times, serif; font-size: 10px; text-align: center; margin-bottom: 10px">

    <!-- Topo da ficha -->

    <p>Dados Internacionais de Catalogação na Publicação (CIP)<br></p>
    @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco<br></p> @else <p>Universidade Federal
        do Agreste de Pernambuco<br></p>@endif
    @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Núcleo de Gestão de Bibliotecas e Documentação - NBID<br>
    </p> @else <p>Sistema Integrado de Bibliotecas (SIB-UFAPE)</p><br>@endif


</div>
<div class="quadrado">
    <table style="font-family: 'Times New Roman', Times, serif; font-size: 10px;  margin-top: 12px;">


        <tr>
            <td valign=top style="width: 13%"><br><span style="margin-left: 10px;">{{ $ficha->cutter}}</span></td>

            <td>
                <table>
                    <!-- Parte padrão -->
                    <tr>
                        <td>{{ $ficha->autor_sobrenome }}, {{ $ficha->autor_nome }}</td>
                    </tr>
                    <tr>
                        <td class="recuo">@if(strlen($ficha->titulo) > 160){{substr($ficha->titulo, 0, strpos($ficha->titulo, ' ', 160 )).'...' }} @else{{$ficha->titulo}} @endif  @if($ficha->subtitulo != null): {{ $ficha->subtitulo }}@endif
                            / {{ $ficha->autor_nome . ' ' . $ficha->autor_sobrenome . '.'}} – {{ $ficha->local }}, {{ $ficha->ano }}.
                        </td>
                    </tr>
                    <tr>
                        <td class="recuo">{{ $ficha->folhas }} f. @if($ficha->ilustracao == 'colorido'): il. color. @elseif($ficha->ilustracao == 'nao_possui')@else: il. @endif</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>


                    <!-- Parte da Monografia -->
                    @if($tipo_documento == 'Monografia')
                        <tr>
                            <td class="recuo">Orientador(a): {{ $documento->nome_orientador }} {{ $documento->sobrenome_orientador }} </td>
                        </tr>
                        <tr>
                            <td class="recuo">@if($documento->nome_coorientador != null)Coorientador(a): {{ $documento->nome_coorientador }} {{ $documento->sobrenome_coorientador }} @endif </td>
                        </tr>
                        <tr>
                            <td class="recuo">Monografia @if($documento->tipo_curso == 'especializacao') (Especialização) @elseif($documento->tipo_curso == 'graduacao') (Graduação) @elseif($documento->tipo_curso == 'mba') (MBA) @endif -
                                 @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco</p> @else
                                    <p>Universidade Federal do Agreste de Pernambuco</p>@endif, Curso: {{ $documento->curso }},
                                 {{ $ficha->local }}, BR-PE, {{ $ficha->ano }}.
                            </td>
                        </tr>

                        <!-- Parte da tese -->
                    @elseif($tipo_documento == 'Tese')
                        <tr>
                            <td class="recuo">Orientador(a): {{ $documento->nome_orientador }} {{ $documento->sobrenome_orientador }}. </td>
                        </tr>
                        <tr>
                            <td class="recuo">@if($documento->nome_coorientador != null)Coorientador(a):  {{ $documento->nome_coorientador }} {{ $documento->sobrenome_coorientador }}. @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="recuo">Tese (Doutorado) - @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco</p> @else
                                    <p>Universidade Federal do Agreste de Pernambuco</p>@endif, {{ $documento->programa }},
                                {{ $ficha->local }}, BR-PE, {{ $ficha->ano }}.
                            </td>
                        </tr>
                    @elseif($tipo_documento == 'ProgramaEduc')
                        <tr>
                            <td class="recuo">Produto Educacional que acompanha Dissertação (Mestrado) - {{ $documento->programa }} - @if($unidade->nome == 'UPE - Campus Garanhuns')<p>
                                    Universidade de Pernambuco</p> @else <p>Universidade Federal do Agreste de
                                    Pernambuco</p>@endif, {{ $unidade->nome }}.
                            </td>
                        </tr>

                        <!-- Parte da Dissertacao -->
                    @else
                        <tr>
                            <td class="recuo">Orientador(a): {{ $documento->nome_orientador }} {{ $documento->sobrenome_orientador }}.</td>
                        </tr>
                        <tr>
                            <td class="recuo">@if($documento->nome_coorientador != null)Coorientador(a): {{ $documento->nome_coorientador }} {{ $documento->sobrenome_coorientador }}. @endif</td>
                        </tr>
                        <tr>
                            <td class="recuo">Dissertação (Mestrado) - @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de Pernambuco</p> @else
                                    <p>Universidade Federal do Agreste de Pernambuco</p>@endif, {{ $documento->programa }},
                                 {{ $ficha->local }}, BR-PE, {{ $ficha->ano }}.
                            </td>
                        </tr>
                    <!--<p>Programa: {{ $documento->programa }}</p>
            <p>Campus: {{ $unidade->nome }}</p> -->
                    @endif

                    <tr>
                        <td><br></td>
                    </tr>
                    <!-- Palavras chave -->
                    @if($tipo_documento == 'Monografia')
                        <tr>
                            <td class="recuo">@for ($i = 0; $i < sizeof($palavras); $i++)
                                    {{ ($i + 1) }}. {{ $palavras[$i]->palavra }}
                                @endfor I. {{ $documento->sobrenome_orientador }}, {{ $documento->nome_orientador }} (orient.)
                                @if($documento->titulacao_coorientador != 'Sem Coorientador')II. {{ $documento->sobrenome_coorientador }}, {{ $documento->nome_coorientador }} (coorient.)
                                III. @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de
                                    Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif IV. Título
                                @else
                                    II. @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de
                                        Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif III. Título
                                @endif</td>

                        </tr>

                    @elseif($tipo_documento == 'Tese')
                        <tr>
                            <td class="recuo">@for ($i = 0; $i < sizeof($palavras); $i++)
                                    {{ ($i + 1) }}. {{ $palavras[$i]->palavra }}
                                @endfor I. {{ $documento->sobrenome_orientador }}, {{ $documento->nome_orientador }} (orient.)
                                @if($documento->titulacao_coorientador != 'Sem Coorientador')II. {{ $documento->sobrenome_coorientador }}, {{ $documento->nome_coorientador }} (coorient.)
                                III. @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de
                                    Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif,
                                 {{ $documento->programa }} IV. Título
                                @else II. @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de
                                    Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif,
                                 {{ $documento->programa }} III. Título

                                @endif</td>

                        </tr>
                    @elseif($tipo_documento == 'ProgramaEduc')
                        <tr>
                            <td class="recuo">@for ($i = 0; $i < sizeof($palavras); $i++)
                                    {{ ($i + 1) }}. {{ $palavras[$i]->palavra }}
                                @endfor

                                I. @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de
                                    Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif
                                II. Título

                                I. @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de
                                    Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif
                                II. Título
                                </td>
                        </tr>

                    @else
                        <tr>
                            <td class="recuo">@for ($i = 0; $i < sizeof($palavras); $i++)
                                    {{ ($i + 1) }}. {{ $palavras[$i]->palavra }}
                                @endfor I. {{ $documento->sobrenome_orientador }}, {{ $documento->nome_orientador }} (orient.)
                                @if($documento->titulacao_coorientador != 'Sem Coorientador')II. {{ $documento->sobrenome_coorientador }}, {{ $documento->nome_coorientador }} (coorient.)
                                III. @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de
                                    Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif,
                                 {{ $documento->programa }} IV. Título
                                @else
                                    II. @if($unidade->nome == 'UPE - Campus Garanhuns')<p>Universidade de
                                        Pernambuco</p> @else <p>Universidade Federal do Agreste de Pernambuco</p>@endif,
                                      {{ $documento->programa }} III. Título
                                @endif</td>

                        </tr>

                    @endif

                    <tr>
                        <td><br></td>
                    </tr>
                    <!-- Parte do CDD -->
                    <tr>
                        <td  align=right><span
                                style="margin-right: 5px;">CDD {{ $ficha->classificacao }}</span></td>
                    </tr>
                </table>
            </td>

            <td valign=top style="width: 6%"></td>
        </tr>

    </table>
</div>

<div class="text-center" style="font-family: 'Times New Roman', Times, serif; font-size: 10px; margin-top: 10px"><span>Elaborado por {{ $userBibliotecario->name }} ({{ $bibliotecario->crb }})</span>
</div>

</body>
</html>
