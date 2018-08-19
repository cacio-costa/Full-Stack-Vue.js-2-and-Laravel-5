<?php

use App\Acomodacao;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'AcomodacaoController@listagemEmHtml');
Route::get('/acomodacoes-salvas', 'AcomodacaoController@listagemEmHtml')->middleware('auth');
Route::get('acomodacoes/{acomodacao}', 'AcomodacaoController@acomodacaoEmHtml');

Auth::routes();