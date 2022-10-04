@extends('layouts.app')

@section('conteudo')
    @section('navbar2.blade.php')

    @endsection

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <form method="POST" enctype="multipart/form-data" id="formRequisicao"
                      action="{{ route('criarDeposito') }}">

                    @csrf
                    <input type="hidden" name="tipo_documento" value="Comprovante de Deposito">
                    <input type="hidden" name="perfil_id" value="{{$perfil_id}}">

                    <! –– Solicitacao Comprovante de Deposito ––>

                    <div class="col-md-12 corpoFicha shadow my-4">

                        <div class="row">
                            <div class="col-md-12 cabecalho py-2">
                                <span class="tituloCabecalho">Solicitação de Comprovante de Depósito</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 py-2 textoFicha">
                                <div class="form-group">
                                    <label for="autor_nome">Nome: <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="autor_nome" name="autor_nome"
                                           placeholder="Digite o nome do Autor" disabled value="{{$usuario->name}}" required>

                                </div>
                                <div class="form-group">
                                    <label for="autor_cpf">CPF: <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="autor_sobrenome" name="autor_cpf"
                                           placeholder="Digite o CPF do Autor" disabled value="{{$aluno->cpf}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="autor_curso">Curso: <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="autor_curso" name="autor_curso"
                                           placeholder="Digite o Curso do Autor" disabled value="{{$curso->nome}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="titulo_trabalho">Título do trabalho: <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="titulo_trabalho" name="titulo_trabalho"
                                           placeholder="Digite o Título do Trabalho" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="anexo1">Comprovante de depósito: <span
                                        style="color: red">*</span></label><br>
                                    <input type="file" id="anexo1" accept="application/pdf, .docx" name="anexo_comprovante_deposito"
                                           style="margin-bottom: 0px" >
                                    <br>
                                    <span id="tipoAnexo"
                                          style="font-size: small; color: gray; margin-top: 0px; margin-bottom: 10px">Tipos permitidos: PDF, DOCX e DOC. </span>
                                </div>

                                <div class="form-group">
                                    <label for="anexo2">Termo de autorização: <span
                                            style="color: red">*</span>
                                    </label><br>
                                    <input type="file" id="anexo2" accept="application/pdf, .docx" name="anexo_termo_aceitacao"
                                           style="margin-bottom: 0px" required>
                                    <br>
                                    <span id="tipoAnexo"
                                          style="font-size: small; color: gray; margin-top: 0px; margin-bottom: 10px">Tipos permitidos: PDF, DOCX e DOC. </span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div style="display: flex; text-align: justify; text-justify: inter-word;">
                        <div>
                            <input type="checkbox" id="checkBoxConfirma" name="checkBoxConfirma" onchange="verificaCheckBoxConfirma()">
                        </div>
                        &nbsp
                        <div>
                            <label for="other"> Eu autorizo que o Sistema Integrado de Bibliotecas da UFAPE faça uso dos dados acima informados para o atendimento de minha solicitação. E também confirmo que as informações enviadas por mim, neste documento, são verdadeiras. </label>
                        </div>
                    </div>

                    <div class="row justify-content-between mt-5">
                        <div class="col-md-4">
                            <a type="button" class="btn btn-block"
                               style="background-color: var(--padrao); border-radius: 0.5rem; color: white;"
                               href="{{ route('prepara-requisicao-bibli') }}">Voltar</a>
                        </div>
                        <div class="col-md-4 text-right">
                            <button type="submit" class="btn btn-block"
                                    id="botaoEnviar"
                                    style="background-color: var(--confirmar); border-radius: 0.5rem; color: white;"
                                    href="#">
                                Enviar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script>
        var myFile = "";
        var size = 0;
        $('#anexo').on('change', function () {

            if (typeof ($("#anexo")[0].files) != "undefined") {
                size = parseFloat($("#anexo")[0].files[0].size / 1024).toFixed(2);
                if (size > 10000) {
                    alert('Os elementos pré-textuais devem ter um tamanho maximo de 10MB Corrija!')
                }

            } else {
                alert("This browser does not support HTML5.");
            }

            myFile = $('#anexo').val();
            var extension = myFile.split('.').pop();
            if (extension == 'pdf' || extension == 'docx' || extension == 'doc') {
                $('#tipoAnexo').css('color', 'green');
            } else {
                $('#tipoAnexo').css('color', 'red');
                alert('O Anexo deve ser de um dos seguites tipos: .pdf, .docx ou .doc.')
            }
        });

        $('#formRequisicao').submit(function (e) {
            myFile = $('#anexo').val();
            var extension = myFile.split('.').pop();
            if (extension == 'pdf' || extension == 'docx' || extension == 'doc') {
                //$('#formRequisicao').submit();
            } else {
                alert('Os elementos pré-textuais devem ser de um dos tipos aceitos: .pdf, .docx ou .doc. Corrija!')
                e.preventDefault();
            }
            if (size > 10000) {
                alert('Os elementos pré-textuais devem ter um tamanho maximo de 10MB Corrija!')
                e.preventDefault();
            }
        });

        var sel = $('#produto');
        var selected = sel.val(); // cache selected value, before reordering
        var opts_list = sel.find('option');
        opts_list.sort(function(a, b) { return $(a).text() > $(b).text() ? 1 : -1; });
        sel.html('').append(opts_list);
        sel.val(selected); // set cached selected value

        function verificaCheckBoxConfirma() {
            var checkBoxConfirma = document.getElementById("checkBoxConfirma");
            var botaoEnviar = document.getElementById("botaoEnviar");
            if (checkBoxConfirma.checked == true){
                botaoEnviar.disabled = false;
            } else {
                botaoEnviar.disabled = true;
            }
        }
        verificaCheckBoxConfirma();
    </script>

@endsection
