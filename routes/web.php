<?php

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
    return view('welcome');
});

Route::get('dashboard/', function () {
    return view('layouts.template');
});


Route::get('registrar', function () {
    return view('auth.registrar');
});

Route::get('compartilhar','ItemController@create')->name('create');

Route::post('registrar', 'UsuarioController@registrar')->name('registrar');
Route::post('compartilhar', 'ItemController@registrar')->name('compartilhar');

Route::resource('dashboard/curso', 'CursoController');
Route::patch('dashboard/curso/{id}/edit', 'CursoController@update');

Route::resource('dashboard/colecao', 'ColecaoController');
Route::patch('dashboard/colecao/{id}/edit', 'ColecaoController@update');

Route::resource('dashboard/tags', 'TagsController');
Route::patch('dashboard/tags/{id}/edit', 'TagsController@update');

Route::resource('dashboard/situacao', 'SituacaoController');
Route::patch('dashboard/situacao/{id}/edit', 'SituacaoController@update');

Route::resource('dashboard/papel', 'PapelController');
Route::patch('dashboard/papel/{id}/edit', 'PapelController@update');

Route::resource('dashboard/arquivo_extensao', 'ArquivoExtensaoController');
Route::patch('dashboard/arquivo_extensao/{id}/edit', 'ArquivoExtensaoController@update');

Route::resource('dashboard/cargos', 'CategoriaController');
Route::patch('dashboard/cargos/{id}/edit', 'CategoriaController@update');

Route::resource('dashboard/disciplina', 'DisciplinaController');
Route::patch('dashboard/disciplina/{id}/edit', 'DisciplinaController@update');

Route::resource('dashboard/configuracao_sistema', 'GlobalConfigController');
Route::patch('dashboard/configuracao_sistema/{id}/edit', 'GlobalConfigController@update');

Route::resource('dashboard/usuario', 'UsuarioController');
Route::patch('dashboard/usuario/{id}/edit', 'UsuarioController@update');

Route::resource('dashboard/producoes', 'ItemController');
Route::patch('dashboard/item/{id}/edit', 'ItemController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
