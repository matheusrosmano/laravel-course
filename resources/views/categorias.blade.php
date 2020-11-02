@extends('layouts.app', ['current' => 'categorias'])
@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">
                Cadastro de categorias
            </h5>
            <label class="card-text">
                <a href="/categorias/novo" class="btn btn-primary btn-sm" role="button">Nova categoria</a>
            </label>
            @if(count($categorias) > 0)
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->nome}}</td>
                            <td>
                                <a href="/categorias/editar/{{$categoria->id}}" class="btn btn-sm btn-primary">
                                    Editar
                                </a>
                                <a href="/categorias/deletar/{{$categoria->id}}" class="btn btn-sm btn-danger">
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
            <a href="/categorias/novo" class="btn btn-primary btn-sm" role="button">Nova categoria</a>
        </div>
    </div>
@endsection
