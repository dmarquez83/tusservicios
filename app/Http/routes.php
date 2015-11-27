<?php


/*-- Rutas de Acceso Publico --*/

Route::get('/', [
  'as' => 'home',
  'uses' => 'HomeController@index',
]);

Route::get('home', [
  'as' => 'home',
  'uses' => 'HomeController@index',
]);
/*
Route::get('search',
    [
        'uses' => 'SearchController@index',
        'as' => 'search'
    ]
);*/

Route::get('buscar/categorias',
    [
        'uses' => 'SearchController@categorias',
        'as' => 'buscar-categorias'
    ]
);

Route::get('buscar/servicios/{id}',
    [
        'uses' => 'SearchController@servicios',
        'as' => 'buscar-servicios'
    ]
);
// Lista de Servicios //esta vista no existe hay que crearla
Route::get('public/servicios/listar', [
    'as' => 'listar',
    'uses' => 'ServiciosController@listar',
]);

// Detalle de Servicio //esta vista no existe hay que crearla
Route::get('public/servicios/{id}', [
  'as' => 'detalle',
  'uses' => 'ServiciosController@detalle',
]);


/**********************************solicitudes**********************************/

// Lista de Categorias
Route::resource('public/categorias', 'SolicitudesCategoriasController' , ['as' => 'categorias']);

Route::get('public/categorias', [
    'as' => 'categorias.index',
    'uses' => 'SolicitudesCategoriasController@index',
]);

Route::resource('public/servicios', 'SolicitudServiciosController', ['as' => 'servicios']);

Route::get('servicios/index/{id}', [
'as' => 'servicios.index',
'uses' => 'SolicitudServiciosController@index',
]);
// Lista de Servicios por Categorias
/*Route::get('public/categorias/{id}', [
  'as' => 'servicios.index',
  'uses' => 'SolicitudServiciosController@index',
]);*/


Route::get('solicitudes/{id}/create', [
  'as' => 'solicitudes.create',
  'uses' => 'SolicitudesCategoriasController@create',
]);

Route::get('solicitudes/{id}/store', [
  'middleware' => 'authusuario',
  'as' => 'solicitudes.store',
  'uses' => 'SolicitudesCategoriasController@store',
]);

Route::get('solicitudes/{id}/delete', [
  'as' => 'solicitudes.delete',
  'uses' => 'SolicitudesCategoriasController@destroy',
]);


/*******************************LOGIN******************************************/

// Login
/*
Route::get('public/login', [
  'as' => 'auth/login',
  'uses' => 'Auth\AuthController@getLogin',
]);*/

Route::get('auth/login', 'Auth\AuthController@getLogin');

Route::post('auth/login', [
  'as' => 'auth/login',
  'uses' => 'Auth\AuthController@postLogin',
]);


// Logout
Route::get('public/logout', [
  'as' => 'auth/logout',
  'uses' => 'Auth\AuthController@getLogout',
]);

// Registro
Route::get('public/registro', [
  'as' => 'auth/register',
  'uses' => 'Auth\AuthController@getRegister',
]);

Route::post('public/registro', [
  'as' => 'auth/register',
  'uses' => 'Auth\AuthController@postRegister',
]);

// Password reset link request routes...
Route::get('public/password', [
  'as' => 'password/email',
  'uses' => 'Auth\PasswordController@getEmail',
]);


Route::post('public/password', [
  'as' => 'password/postEmail',
  'uses' => 'Auth\PasswordController@postEmail',
]);

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', ['as' => 'password/postReset', 'uses' =>  'Auth\PasswordController@postReset']);


//Socialite
Route::get('login/{provider}',[
  'uses' => 'Auth\AuthController@login',
  'as'   => 'auth.getSocialAuth'
]);
/*Route::get('public/login/{provider}',[*/
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

   /**********************************Tipo usuarios**********************************/


    Route::resource('tipousuarios', 'TipousuariosController');

    Route::get('tipousuarios/{id}/delete', [
      'as' => 'tipousuarios.delete',
      'uses' => 'TipousuariosController@destroy',
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

    /**********************************Ponderacions**********************************/

    Route::resource('ponderaciones', 'PonderacionController');

    Route::get('ponderaciones/{id}/delete', [
      'as' => 'ponderaciones.delete',
      'uses' => 'PonderacionController@destroy',
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

    /**********************************Evaluaciones**********************************/

    Route::resource('evaluaciones', 'EvaluacionesController');

    Route::get('evaluaciones/{id}/delete', [
      'as' => 'evaluaciones.delete',
      'uses' => 'EvaluacionesController@destroy',
    ]);

    /**********************************Insumos faltan las vistas**********************************/

    Route::resource('insumos', 'InsumoController');

    Route::get('insumos/{id}/delete', [
      'as' => 'insumos.delete',
      'uses' => 'InsumoController@destroy',
    ]);

});


/**********************************Mapa**********************************/

Route::get('geocoder', 'OtherGeocoderController@index');





