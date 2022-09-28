@extends('layout.app')

@section('title', 'Ferramenta Gerador Json')

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form id="dados_cadastro" action="{{ route('postJson') }}" method="post">
                    {!! csrf_field() !!}

                    <div class="tab-content ">
                        <!-- style="display: none" -->
                        <div class="tab-pane active" id="dados" data-role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 dados_assunto">
                                    <label class="text-muted">Assunto:</label>
                                    <input required name="assunto" type="text" class="form-control" id="assunto"
                                        value="">
                                </div>
                                <div class="col-md-6 ">
                                    <label class="text-muted">Idioma:</label><br>
                                    <input required class="form-control" id="idioma" name="idioma" value="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="text-muted">Descrição Assunto:</label>
                                    <textarea name="descricao_assunto" id="descricao_assunto" class="textarea_editor form-control" rows="3"></textarea>
                                </div>
                            </div>
                            <div>
                                <br><br>
                                <h4 class="page-title">Referência Tema</h4>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Título</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Referência - Link</label>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="titulo_referencia"
                                            id="titulo_referencia" value="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">

                                        <input type="text" class="form-control" name="referencia" id="referencia"
                                            value="">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <a href="#salvar_url" class="btn btn-primary" id="salvar_url">Adicionar</a>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table mb-0" id="all-member-table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="45%" scope="col">Título</th>
                                                <th width="45%" scope="col">Referência</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                 <input type="submit" class="btn btn-primary my-4" value="Salvar"> -->
                    <button class="btn btn-primary my-4" type="submit">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#salvar_url").click(function() {
                if ($("#titulo_referencia").val() == "") {
                    alert("Informe Título de Refência.");
                    $("#titulo_referencia").val("");
                    return;
                }

                if ($("#referencia").val() == "") {
                    alert("Informe a Refência ou a Matéria.");
                    $("#referencia").val("");
                    return;
                }

                var referencia = $("#referencia").val();
                var tituloReferencia = $("#titulo_referencia").val();
                adicionarLinha(referencia, tituloReferencia);

                $("#referencia").val("");
                $("#titulo_referencia").val("");
            });
        });

        function adicionarLinha(descricao, titulo, idUrl = 0) {
            var tabela = document.getElementById("all-member-table");
            var numeroLinhas = tabela.rows.length;
            if (numeroLinhas > 0) {
                $("#todas_perguntas").css("display", "block");
            }
            var linha = tabela.insertRow(numeroLinhas);
            var chave = "linha_" + numeroLinhas;
            linha.id = chave;
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);
            var celula3 = linha.insertCell(2);
            celula1.innerHTML = titulo;
            celula2.innerHTML = descricao;
            celula3.innerHTML =
                '<input type="hidden" id="pergunta" name="descricao_referencia[]" class="id_descricao_' +
                numeroLinhas +
                '" value="' +
                descricao +
                '">' +
                '<input type="hidden" id="pergunta" name="titulo[]" class="id_titulo_' +
                numeroLinhas +
                '" value="' +
                titulo +
                '">' +
                '<input type="hidden" id="materia" name="materia[]" class="id_materia_' +
                numeroLinhas +
                '" value="' +
                idMateria +
                '">' +
                '<input type="hidden" id="id_table_url_' +
                numeroLinhas +
                '" name="id_table_url_' +
                numeroLinhas +
                '" class="id_table_url_' +
                numeroLinhas +
                '" value="' +
                idUrl +
                '">' +
                '<a href="#todas_url" onclick="removeLinha(' +
                numeroLinhas +
                ')" class="btn btn-danger">Remover</a>';
        }
    </script>
@endsection
