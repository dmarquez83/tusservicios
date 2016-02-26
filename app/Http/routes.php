<?php
/*************************** PUBLIC ***************************************/
// Home
Route::get('/', ['as' => 'home','uses' => 'HomeController@index',]);
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index',]);

// Login
Route::get('login',[
    'as' => 'login',
    'uses' => 'Auth\AuthController@getLogin',
]);

Route::post('login', [
    'as' => 'login',
    'uses' => 'Auth\AuthController@postLogin',
]);

// Logout
Route::get('logout', [
    'as' => 'logout',
    'uses' => 'Auth\AuthController@getLogout',
]);

// Registro
Route::get('registro', [
    'as' => 'registro',
    'uses' => 'Auth\AuthController@getRegister',
]);

Route::post('registro', [
    'as' => 'registro',
    'uses' => 'Auth\AuthController@postRegister',
]);

// Cambio de Password
Route::get('public/password', [
    'as' => 'password/email',
    'uses' => 'Auth\PasswordController@getEmail',
]);

Route::post('public/password', [
    'as' => 'password/postEmail',
    'uses' => 'Auth\PasswordController@postEmail'
]);

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', [
    'as' => 'password/postReset',
    'uses' =>  'Auth\PasswordController@postReset'
]);

//Socialite
Route::get('login/{provider}',[
    'uses' => 'Auth\AuthController@login',
    'as'   => 'auth.getSocialAuth'
]);

// Categorias
Route::get('public/categorias',[
    'uses' => 'PublicCategoriasController@index',
    'as' => 'public.categorias.index'
]);

// Detalle Categoria
Route::get('public/categorias/{id}',[
    'uses' => 'PublicCategoriasController@show',
    'as' => 'public.categorias.show'
]);

// Servicios
Route::get('public/servicios', [
    'as' => 'public.servicios.index',
    'uses' => 'PublicServiciosController@index'
]);

Route::get('public/servicios/{id}', [
    'as' => 'detalle',
    'uses' => 'PublicServiciosController@detalle'
]);