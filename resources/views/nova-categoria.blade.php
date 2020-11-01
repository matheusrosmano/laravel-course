@extends('layouts.app', ['current' => 'categorias'])
@section('body')
    <h4>Cadastrar nova categoria</h4>
    <div class="card body">
        <div class="card-body">
            <form action="/categorias" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="nome">Nome da categoria</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome da categoria">

                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>
@endsection
