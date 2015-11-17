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
    return view('home.index');
});
*/

//Route::get('home', 'HomeController@index');

//Route::get('/', 'HomeController@index');


Route::get('/', [
  'as' => 'home',
  'uses' => 'HomeController@index',
]);


Route::get('home', [
  'as' => 'home',
  'uses' => 'HomeController@index',
]);


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

Route::get('login/{provider}',[
  'uses' => 'Auth\AuthController@login',
  'as'   => 'auth.getSocialAuth'
]);

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

// ADMIN -------------

Route::group(['middleware' => ['auth']], function()
{


    /**********************************Categoria**********************************/

    Route::resource('admin/categorias', 'CategoriaController');


    Route::get('admin/categorias/{id}/delete', [
        'as' => 'admin.categorias.delete',
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


    Route::resource('categorias/servicios', 'ServiciosController');


    Route::get('categorias/servicios/{id}/delete', [
        'as' => 'categorias.servicios.delete',
        'uses' => 'ServiciosController@destroy',
    ]);

    Route::resource('admin/servicios', 'ServiciosAdminController');

    Route::get('admin/servicios/{id}/create', [
        'as' => 'admin.servicios.create',
        'uses' => 'ServiciosAdminController@create',
    ]);
    /**********************************Estatus**********************************/

    //Route::resource('estatus', 'API\EstatuAPIController');

    Route::resource('estatus', 'EstatuController');

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
});


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


/**********************************Evaluaciones**********************************/

Route::resource('evaluaciones', 'EvaluacionesController');

Route::get('evaluaciones/{id}/delete', [
  'as' => 'evaluaciones.delete',
  'uses' => 'EvaluacionesController@destroy',
]);
/**********************************solicitudes**********************************/


Route::resource('categorias', 'SolicitudesCategoriasController');

Route::get('solicitudes/{id}/create', [
  'as' => 'solicitudes.create',
  'uses' => 'SolicitudesCategoriasController@create',
]);

Route::get('solicitudes/{id}/store', [
  'middleware' => 'auth',
  'as' => 'solicitudes.store',
  'uses' => 'SolicitudesCategoriasController@store',
]);

Route::get('solicitudes/{id}/delete', [
  'as' => 'solicitudes.delete',
  'uses' => 'SolicitudesCategoriasController@destroy',
]);


Route::resource('servicios', 'SolicitudServiciosController');


Route::get('servicios/{id}/index', [
  'as' => 'servicios.index',
  'uses' => 'SolicitudServiciosController@index',
]);


/**********************************Mapa**********************************/

Route::get('geocoder', 'OtherGeocoderController@index');




/**********************************Pruebas de Imagenes**********************************/

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

