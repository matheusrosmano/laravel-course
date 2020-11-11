@extends('layouts.app', ['current' => 'produtos'])
@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">
                Cadastro de produtos
            </h5>
            <label class="card-text">
                <button class="btn btn-primary btn-sm" role="button" onclick="javascript:novoProduto();">Novo produto</button>
            </label>
            <table class="table table-hover table-bordered" id="tblProduto">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="modal" tabindex="1" role="dialog" id="dlgProdutos">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" id="formProduto">
                        <div class="modal-header">
                            <h5 class="modal-title">Novo Produto</h5>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="nome" class="custom-control-label">Nome</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nome" placeholder="Nome do produto">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="estoque" class="custom-control-label">Quantidade em estoque</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="estoque">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="preco" class="custom-control-label">Preço</label>
                                <div class="input-group">
                                    <input type="numeric" class="form-control" id="preco" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="categoria" class="custom-control-label">Categoria</label>
                                <div class="input-group">
                                    <select name="categoria" id="categoria" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal" >Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        function novoProduto() {
            $('#formProduto input[type=text], #formProduto input[type=number]').each(function () {
               $(this).val('');
            });

            $('h5.modal-title').text('Cadastrar produto');
            $('#dlgProdutos').modal('show');
        }

        function carregaCategorias() {
            $.getJSON('/api/categorias', function (data) {
                for (i = 0; i < data.length; i++) {
                    opcao = '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
                    $('#categoria').append(opcao);
                }
            });
        }

        function editar(id) {
            $.getJSON('/api/produtos/' + id, function (data) {
                $('#id').val(data.id);
                $('#nome').val(data.nome);
                $('#estoque').val(data.estoque);
                $('#preco').val(data.preco);
                $('#categoria').val(data.categoria_id);

                $('h5.modal-title').text('Editar produto');
                $('#dlgProdutos').modal('show');
            });
        }

        function montarLinha(produto) {
            var linha = '<tr>';
            linha += '<td>' + produto.id + '</td>';
            linha += '<td>' + produto.nome + '</td>';
            linha += '<td>' + produto.estoque + '</td>';
            linha += '<td>' + produto.preco + '</td>';
            linha += '<td>' + produto.categoria.nome + '</td>';
            linha += '<td>';
            linha += '<button class="btn btn-sm btn-primary"onclick="editar('  + produto.id + ')">Editar</button>';
            linha += '<button class="btn btn-sm btn-danger" onclick="deletar(' + produto.id + ')">Apagar</button>';
            linha += '</td>';
            linha += '</tr>';

            return linha;
        }

        function carregaProdutos() {
            $.getJSON('/api/produtos', function (produtos) {
                for (i = 0; i < produtos.length; i++) {
                    var linha = montarLinha(produtos[i]);
                    $('#tblProduto > tbody').append(linha);
                }
            });
        }

        function criarProduto() {
            var produto = {
                nome: $('#nome').val(),
                estoque: $('#estoque').val(),
                preco: $('#preco').val(),
                categoria_id: $('#categoria').val()
            };
            console.log(produto);
            $.post('/api/produtos', produto, function (data) {
                var dadosJson = JSON.parse(data);
                var linha = montarLinha(dadosJson);
                $('#tblProduto > tbody').append(linha);
            });
        }

        function deletar(id) {
            $.ajax({
                type: "DELETE",
                url: '/api/produtos/' + id,
                context: this,
                success: function () {
                    console.log('Apagou ok');
                    var linhas = $('#tblProduto > tbody > tr');
                    var e = linhas.filter(function (index, elemento) {
                        return elemento.cells[0].textContent == id;
                    });
                    e.remove();
                },
                error: function (error) {
                    console.log(error);
                }
            })
        }

        function salvarProduto() {
            var produto = {
                id: $('#id').val(),
                nome: $('#nome').val(),
                estoque: $('#estoque').val(),
                preco: $('#preco').val(),
                categoria_id: $('#categoria').val()
            };

            $.ajax({
                type: "PUT",
                url: '/api/produtos/' + produto.id,
                data: produto,
                context: this,
                success: function (data) {
                    prod = JSON.parse(data);

                    var linhas = $('#tblProduto > tbody > tr');
                    var e = linhas.filter(function (index, elemento) {
                        return elemento.cells[0].textContent == produto.id;
                    });
                    e[0].cells[0].textContent = prod.id;
                    e[0].cells[1].textContent = prod.nome;
                    e[0].cells[2].textContent = prod.estoque;
                    e[0].cells[3].textContent = prod.preco;
                    e[0].cells[4].textContent = prod.categoria_id;
                },
                error: function (error) {
                    console.log(error);
                }
            })
        }

        $(function() {
            carregaCategorias();
            carregaProdutos();
            $('#formProduto').submit(function (event) {
                event.preventDefault();
                if ($('#id').val() == '') {
                    criarProduto();
                }
                else {
                    salvarProduto();
                }
                $('#dlgProdutos').modal('hide');
            });
        });
    </script>
@endsection
