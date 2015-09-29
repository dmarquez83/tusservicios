<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', 'HomeController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);


// Password reset link request routes...
Route::get('password/email', ['as' => 'password/email', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('password/email', ['as' => 'password/postEmail', 'uses' => 'Auth\PasswordController@postEmail']);

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', ['as' => 'password/postReset', 'uses' =>  'Auth\PasswordController@postReset']);

Route::get('auth', function(){
  return OAuth::authorize('facebook');
});

Route::get('login', 'WelcomeController@index');

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function ()
{
	Route::group(['prefix' => 'v1'], function ()
	{
        require Config::get('generator.path_api_routes');
	});
});

/**********************************Insumos**********************************/

Route::resource('insumos', 'InsumoController');

Route::get('api/insumos','API\InsumoAPIController@index');

Route::get('api/insumos/{id}','API\InsumoAPIController@show');

//Route::get('api/insumos/{des}/{ref}','API\InsumoAPIController@newInsumos'); esto para probar el re+gistro

Route::post('api/insumos/{des}/{ref}','API\InsumoAPIController@newInsumos');


Route::get('insumos/{id}/delete', [
    'as' => 'insumos.delete',
    'uses' => 'InsumoController@destroy',
]);

/**********************************Categoria**********************************/

Route::resource('categorias', 'CategoriaController');


Route::get('categorias/{id}/delete', [
    'as' => 'categorias.delete',
    'uses' => 'CategoriaController@destroy',
]);



/**********************************tipo_servicios**********************************/


Route::resource('tiposervicios', 'TiposervicioController');

Route::get('tiposervicios/{id}/delete', [
    'as' => 'tiposervicios.delete',
    'uses' => 'TiposervicioController@destroy',
]);


