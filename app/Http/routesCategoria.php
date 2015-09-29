<?php

/*
|--------------------------------------------------------------------------
| Application RoutesCategoria
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::resource('categorias', 'CategoriaController');


Route::get('categorias/{id}/delete', [
    'as' => 'categorias.delete',
    'uses' => 'CategoriaController@destroy',
]);

