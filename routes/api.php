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

Route::group([
    'namespace' => 'Api'
], function($route) {
    $route->get('disciplinas', 'DisciplinaController@index');
    $route->get('cursos', 'CursoController@index');
    $route->get('colecoes', 'ColecaoController@index');
    $route->get('papeis', 'PapelController@index');
    $route->get('usuarios', 'UsuarioController@index');
    $route->get('tags', 'TagsController@index');

    $route->post('item/registrar/informacoes', 'ItemController@registrarInformacoes');

    $route->get('procurar-autor', 'UsuarioController@queryUsers');
});

