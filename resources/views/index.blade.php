@extends('layouts.app', ['current' => 'inicio'])
@section('body')
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de produto</h5>
                        <p class="card-body">
                            Aqui você cadastra todos os seus produtos,
                            só não esqueça as categorias
                        </p>
                        <a href="/produtos" class="btn btn-primary">Cadastre seus produtos</a>
                    </div>
                </div>

                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de categorias</h5>
                        <p class="card-body">
                            Aqui você cadastra todos os seus categorias.
                        </p>
                        <a href="/categorias" class="btn btn-primary">Cadastre suas categorias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
