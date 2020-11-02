<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produtos/novo', [ProdutoController::class, 'create']);
Route::post('/produtos', [ProdutoController::class, 'store']);
Route::get('/produtos/editar/{id}', [ProdutoController::class, 'edit']);
Route::post('/produtos/editar/{id}', [ProdutoController::class, 'update']);
Route::get('/produtos/deletar/{id}', [ProdutoController::class, 'destroy']);
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::get('/categorias/novo', [CategoriaController::class, 'create']);
Route::post('/categorias', [CategoriaController::class, 'store']);
Route::get('/categorias/deletar/{id}', [CategoriaController::class, 'destroy']);
Route::get('/categorias/editar/{id}', [CategoriaController::class, 'edit']);
Route::post('/categorias/editar/{id}', [CategoriaController::class, 'update']);
