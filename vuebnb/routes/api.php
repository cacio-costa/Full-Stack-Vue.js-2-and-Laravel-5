<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/", "AcomodacaoController@listagemEmJson");
Route::get("/acomodacoes-salvas", "AcomodacaoController@listagemEmJson");
Route::get("acomodacoes/{acomodacao}", "AcomodacaoController@acomodacaoEmJson");

Route::post('/user/toggle_saved', 'UsuarioController@salvaAcomodacoes')
    ->middleware('auth:api');