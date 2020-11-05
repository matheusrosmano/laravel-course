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
            <table class="table table-hover table-bordered">
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
                            <input type="hidden" name="id">
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
                                    <input type="number" class="form-control" id="preco" >
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
                            <button type="submit" class="btn btn-secondary" data-dissmiss="modal" >Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        function novoProduto() {
            $('#formProduto input[type=text], #formProduto input[type=number]').each(function () {
               $(this).val('');
            });
            carregaCategorias();

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
    </script>
@endsection
