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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('home', 'HomeController@index');

Route::get('/', 'HomeController@index');

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

/**********************************Categoria**********************************/

Route::resource('categorias', 'CategoriaController');


Route::get('categorias/{id}/delete', [
    'as' => 'categorias.delete',
    'uses' => 'CategoriaController@destroy',
]);


/**********************************tipo_servicios**********************************/


Route::resource('tiposervicios', 'TiposervicioController');

Route::get('tiposervicios/{id}/createnew', [
    'as' => 'tiposervicios.createnew',
    'uses' => 'TiposervicioController@createnew',
]);

Route::post('tiposervicios/{id}/storenew', [
    'as' => 'tiposervicios.storenew',
    'uses' => 'TiposervicioController@storenew',
]);


Route::get('tiposerviciost/indextiposervicio', [
    'as' => 'tiposerviciost.indextiposervicio',
    'uses' => 'TiposervicioController@indextiposervicio',
]);


Route::get('tiposervicios/{id}/delete', [
    'as' => 'tiposervicios.delete',
    'uses' => 'TiposervicioController@destroy',
]);

/**********************************Servicios**********************************/


Route::resource('servicios', 'ServiciosController');


Route::get('servicios/{id}/delete', [
    'as' => 'servicios.delete',
    'uses' => 'ServiciosController@destroy',
]);

Route::resource('serviciostodos', 'ServiciosTodosController');

Route::get('serviciostodos/{id}/create', [
    'as' => 'serviciostodos.create',
    'uses' => 'ServiciosTodosController@create',
]);


/**********************************Insumos**********************************/

Route::resource('insumos', 'InsumoController');

Route::get('api/insumos','API\InsumoAPIController@index');

Route::get('api/insumos/{id}','API\InsumoAPIController@show');

//Route::get('api/insumos/{des}/{ref}','API\InsumoAPIController@newInsumos'); //esto para probar el re+gistro

Route::post('api/insumos/{des}/{ref}','API\InsumoAPIController@newInsumos');


Route::get('insumos/{id}/delete', [
    'as' => 'insumos.delete',
    'uses' => 'InsumoController@destroy',
]);






/**********************************Estatus**********************************/

Route::resource('estatus', 'API\EstatuAPIController');

Route::get('estatus/{id}/delete', [
    'as' => 'estatus.delete',
    'uses' => 'EstatuController@destroy',
]);

Route::get('estatus_tab', function ()    {
    return view('estatus.table');
});






/**********************************Ponderacions**********************************/

Route::resource('ponderacions', 'PonderacionController');

Route::get('ponderacions/{id}/delete', [
    'as' => 'ponderacions.delete',
    'uses' => 'PonderacionController@destroy',
]);

/**********************************Tipo usuarios**********************************/


Route::resource('tipousuarios', 'TipousuariosController');

Route::get('tipousuarios/{id}/delete', [
    'as' => 'tipousuarios.delete',
    'uses' => 'TipousuariosController@destroy',
]);

/**********************************Evaluaciones**********************************/

Route::resource('evaluaciones', 'EvaluacionesController');

Route::get('evaluaciones/{id}/delete', [
    'as' => 'evaluaciones.delete',
    'uses' => 'EvaluacionesController@destroy',
]);

/**********************************Mapa**********************************/

Route::get('geocoder', 'OtherGeocoderController@index');


/**********************************solicitudes**********************************/


Route::resource('solicitudes', 'SolicitudesController');

Route::get('solicitudes/{id}/delete', [
    'as' => 'solicitudes.delete',
    'uses' => 'SolicitudesController@destroy',
]);


Route::resource('thumbnail', 'ThumbnailController');


Route::get('foo', function() {

    $image = Image::make('http://placehold.it/500x500/000/e8117f');
    return Response::make($image->encode('jpg'), 200, ['Content-Type' => 'image/jpeg']);
});


Route::get('otro', function()
{
    $img = Image::make('foo.jpg')->resize(300, 200);

    return $img->response('jpg');
});

Route::resource('fernandos', 'fernandoController');

Route::get('fernandos/{id}/delete', [
    'as' => 'fernandos.delete',
    'uses' => 'fernandoController@destroy',
]);


Route::resource('lorenzos', 'LorenzoController');

Route::get('lorenzos/{id}/delete', [
    'as' => 'lorenzos.delete',
    'uses' => 'LorenzoController@destroy',
]);


Route::resource('pruebas', 'pruebaController');

Route::get('pruebas/{id}/delete', [
    'as' => 'pruebas.delete',
    'uses' => 'pruebaController@destroy',
]);


Route::resource('pruebas', 'pruebaController');

Route::get('pruebas/{id}/delete', [
    'as' => 'pruebas.delete',
    'uses' => 'pruebaController@destroy',
]);


Route::resource('pruebas', 'pruebaController');

Route::get('pruebas/{id}/delete', [
    'as' => 'pruebas.delete',
    'uses' => 'pruebaController@destroy',
]);


Route::resource('pruebas', 'pruebaController');

Route::get('pruebas/{id}/delete', [
    'as' => 'pruebas.delete',
    'uses' => 'pruebaController@destroy',
]);
