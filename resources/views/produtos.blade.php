@extends('layouts.app', ['current' => 'produtos'])
@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">
                Cadastro de produtos
            </h5>
            <label class="card-text">
                <a href="/produtos/novo" class="btn btn-primary btn-sm" role="button">Novo produto</a>
            </label>
            @if(count($produtos) > 0)
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->nome}}</td>
                            <td>
                                {{$produto->parent('categoria')->get()[0]->nome}}
                            </td>
                            <td>{{$produto->estoque}}</td>
                            <td>{{$produto->preco}}</td>
                            <td>
                                <a href="/produtos/editar/{{$produto->id}}" class="btn btn-sm btn-primary">
                                    Editar
                                </a>
                                <a href="/produtos/deletar/{{$produto->id}}" class="btn btn-sm btn-danger">
                                    Deletar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="/produtos/novo" class="btn btn-primary btn-sm" role="button">Novo produto</a>
        </div>
    </div>
@endsection
