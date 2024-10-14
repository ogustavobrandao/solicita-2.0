
@extends('layouts.app')

    <style>
        .link-customizado {
            text-decoration: none !important;
            color: inherit !important;
        }
    </style>


@section('conteudo')

    <div class="container">
        <div class="row" style="border-bottom: var(--textcolor) 2px solid">
            <span class="titulo">Abertura de processos</span>
        </div>

        <div class="row mt-5">
            <div class="col-md-4">
                <a href="{{route('excepcional.create')}}" class="link-customizado">
                    <div class="text-center p-5 shadow caixaSelecao" style="background-color: #003358">
                        <svg xmlns="http://www.w3.org/2000/svg" height="80" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                            <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/>
                        </svg>
                        <p class="textoCaixa">Tratamemento excepcional</p>

                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{route('antecipacao_grau.create')}}" class="link-customizado">
                    <div class="text-center p-5 shadow caixaSelecao" style="background-color: #167BB5">
                        <svg xmlns="http://www.w3.org/2000/svg" height="80" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                        </svg>
                        <h2 class="textoCaixa">Antencipação de colocação de grau</h2>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{route('alteracao.create')}}" class="link-customizado">
                    <div class="text-center p-5 shadow caixaSelecao" style="background-color: #2D9CDB">
                        <svg xmlns="http://www.w3.org/2000/svg" height="80" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>

                        <p class="textoCaixa">Alteração cadastral</p>

                    </div>
                </a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4">
                <a href="{{route('complementar.create')}}" class="link-customizado">
                    <div class="text-center p-5 shadow caixaSelecao" style="background-color: #003358">
                        <svg xmlns="http://www.w3.org/2000/svg" height="80" fill="currentColor" class="bi bi-file-earmark-richtext" viewBox="0 0 16 16">
                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                            <path d="M4.5 12.5A.5.5 0 0 1 5 12h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5m0-2A.5.5 0 0 1 5 10h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5m1.639-3.708 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V8.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V8s1.54-1.274 1.639-1.208M6.25 6a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5"/>
                        </svg>

                        <p class="textoCaixa">Atividade complementar</p>

                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{route('educacao.create')}}" class="link-customizado">
                    <div class="text-center p-5 shadow caixaSelecao" style="background-color: #167BB5">
                        <svg xmlns="http://www.w3.org/2000/svg" height="80" fill="currentColor" class="bi bi-file-earmark-minus" viewBox="0 0 16 16">
                            <path d="M5.5 9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5"/>
                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                        </svg>

                        <h2 class="textoCaixa">Dispensa de Educação Física</h2>

                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{route('disciplina.create')}}" class="link-customizado">
                    <div class="text-center p-5 shadow caixaSelecao" style="background-color: #2D9CDB">
                        <svg xmlns="http://www.w3.org/2000/svg" height="80" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                            <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293z"/>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                        </svg>

                        <p class="textoCaixa">Dispensa de disciplina</p>

                    </div>
                </a>
            </div>

        </div>
    </div>
    @endsection
