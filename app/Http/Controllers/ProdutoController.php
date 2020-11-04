<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();

        return view('produtos', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all()->sortBy('nome');

        return view('novo-produto', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome'              => 'required|min:5',
            'categoria'         => 'required',
            'estoque'           => 'required|int',
            'preco'             => 'required|float',
        ];

        $mensagens = [
            'required'         => 'O :attribute é obrigatório.',
            'nome.min'              => 'O valor ":input" não parece ter no minímo :min caracteres.',
        ];

        $request->validate($regras, $mensagens);

        $produto = new Produto();
        $produto->nome = $request->input('nome');
        $produto->categoria_id = $request->input('categoria');
        $produto->estoque = $request->input('estoque');
        $produto->preco = $request->input('preco');

        $produto->save();
        return redirect('produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $categorias = Categoria::all();

        if (empty($produto)) {
            return redirect('/produtos');
        }

        return view('editar-produto', compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);

        if (empty($produto)) {
            return redirect('/produtos');
        }

        $produto->nome = $request->input('nome');
        $produto->categoria_id = $request->input('categoria');
        $produto->estoque = $request->input('estoque');
        $produto->preco = $request->input('preco');

        $produto->save();
        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        if (empty($produto)) {
            return redirect('/produtos');
        }
        $produto->delete();
        return redirect('/produtos');
    }
}
