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
    return view('layouts.main');
});


Route::resource('dashboard/curso', 'CursoController');
Route::patch('dashboard/curso/{id}/edit', 'CursoController@update');
Route::patch('dashboard/curso/{id}/delete', 'CursoController@destroy');

Route::resource('dashboard/tags', 'TagsController');
Route::patch('dashboard/tags/{id}/edit', 'TagsController@update');
Route::patch('dashboard/tags/{id}/delete', 'TagsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
