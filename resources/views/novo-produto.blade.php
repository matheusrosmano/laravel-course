@extends('layouts.app', ['current' => 'produtos'])
@section('body')
    <h4>Cadastrar novo produto</h4>
    <div class="card body">
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    Formulário possui dados incorretos.
                </div>
            @endif
            <form action="/produtos" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}" id="nome" placeholder="Nome do produto" required>
                    @if($errors->get('nome'))
                        <p class="text-danger">
                            @foreach($errors->get('nome') as $erro)
                                {{$erro}} <br/>
                            @endforeach
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="categoria_id" class="form-text">Categoria</label>
                    <select name="categoria" class="form-control">
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="estoque" class="form-text">Quantidade em estoque</label>
                    <input type="text" class="form-text" name="estoque" id="estoque">
                    @if($errors->get('estoque'))
                        <p class="text-danger">
                            @foreach($errors->get('estoque') as $erro)
                                {{$erro}} <br/>
                            @endforeach
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="preco" class="form-text">Preço</label>
                    <input type="currency" name="preco" id="preco" data-type="currency">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>
@endsection
