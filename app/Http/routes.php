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

Route::get('public/categorias/{id}', [
    'as' => 'detalle-categorias',
    'uses' => 'ServiciosController@detallecategorias',
]);

/**********************************dashborad carolina**********************************/


Route::get('public/dashborad',
    function ()    {
        return view('dashborad.tableusuario');
    });

Route::get('admin/dashborad',
    function ()    {
        return view('dashborad.tableadmin');
    });

Route::get('public/dashborad/proveedor',
    function ()    {
        return view('dashborad.tableproveedor');
    });

Route::get('public/dashborad/consultor',
    function ()    {
        return view('dashborad.tableconsultor');
    });

/**********************************registro catalogo insumo carolina**********************************/
/*
Route::get('admin/catalogos',
    function ()    {
        return view('catalogos.tablecatalogo');
    });
*/
/**********************************registro servicios carolina**********************************/

Route::get('public/regservicios',
    function ()    {
        return view('servicios.tableregservicios');
    });



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

// ADMIN ------------------------------------------------------------------------------------

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


    /**********************************tipo_servicios**************************/


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

    /**********************************Ponderacions****************************/

    Route::resource('ponderaciones', 'PonderacionController');

    Route::get('ponderaciones/{id}/delete', [
      'as' => 'ponderaciones.delete',
      'uses' => 'PonderacionController@destroy',
    ]);

    /**********************************Estatus*********************************/

    //Route::resource('estatus', 'API\EstatuAPIController');

    Route::resource('estatus', 'EstatuController');

    Route::get('estatus/{id}/delete', [
      'as' => 'estatus.delete',
      'uses' => 'EstatuController@destroy',
    ]);

    Route::get('estatus_tab', function ()    {
      return view('estatus.table');
    });


  /**********************************Servicios con categorias**********************************/


    Route::resource('categorias/servicios', 'ServiciosController');


    Route::get('categorias/servicios/{id}/delete', [
        'as' => 'categorias.servicios.delete',
        'uses' => 'ServiciosController@destroy',
    ]);

    Route::get('categorias/desplegable', [
        'as' => 'categorias.servicios.desplegable',
        'uses' => 'ServiciosController@desplegable',
    ]);
/*
    Route::get('dropdown', function(){
        $id = Input::get('option');
        $tiposervicios = \App\Models\Categoria::find('1')->tiposervicio;
        dd ($tiposervicios);
        return $tiposervicios->lists('tiposervicios', 'id');
    });*/

  /**********************************Servicios**********************************/

    Route::resource('admin/servicios', 'ServiciosAdminController');

    Route::get('admin/servicios/{id}/create', [
        'as' => 'admin.servicios.create',
        'uses' => 'ServiciosAdminController@create',
    ]);




    /****************************Evaluaciones**********************************/

    Route::resource('evaluaciones', 'EvaluacionesController');

    Route::get('evaluaciones/{id}/delete', [
      'as' => 'evaluaciones.delete',
      'uses' => 'EvaluacionesController@destroy',
    ]);

    /**********************************Insumos*********************************/

    Route::resource('insumos', 'InsumoController');

    Route::get('insumos/{id}/delete', [
      'as' => 'insumos.delete',
      'uses' => 'InsumoController@destroy',
    ]);

    Route::resource('insumosFotos', 'InsumosFotoController');

    Route::get('insumosFotos/{id}/delete', [
      'as' => 'insumosFotos.delete',
      'uses' => 'InsumosFotoController@destroy',
    ]);

    Route::resource('insumosServicios', 'InsumosServiciosController');

    Route::get('insumosServicios/{id}/delete', [
      'as' => 'insumosServicios.delete',
      'uses' => 'InsumosServiciosController@destroy',
    ]);


    Route::post('solicitud/insumos', [
     'as' => 'insumosSolicitudes.detalle',
     'uses' => 'InsumosSolicitudesController@detalle',
    ]);

  Route::post('insumoSolicitudes/guardar', [
    'as' => 'insumoSolicitudes.getGuardar',
    'uses' => 'InsumosSolicitudesController@getGuardar',
  ]);




  /**********************************Proveedores*******************************/

    Route::resource('admin/proveedores', 'ProveedoresController');

    Route::get('admin/proveedores/borrar/{id}', [
      'as' => 'admin.proveedores.delete',
      'uses' => 'ProveedoresController@destroy',
    ]);


    Route::get('admin/insumos/listado', [
        'as' => 'admin.insumos.getListadoInsumos',
        'uses' => 'InsumoController@getListadoInsumos',
    ]);



  /**********************************Proveedores Insumos **********************/

    Route::resource('proveedoresInsumos', 'ProveedoresInsumosController');

    Route::get('proveedoresInsumos/{id}/delete', [
      'as' => 'proveedoresInsumos.delete',
      'uses' => 'ProveedoresInsumosController@destroy',
    ]);

  /**********************************Lista de Solicitudes  + Registro de Catalogo**********************/

    Route::get('admin/solicitudes/listado', [
      'as' => 'solicitudes.listado',
      'uses' => 'SolicitudesCategoriasController@listado',
    ]);


  /**********************************Catalogo Solicitud**********************************/

    Route::resource('admin/catalogos', 'CatalogosController');

    Route::get('admin/catalogos/crear/{id}', [
      'as' => 'catalogos.createnew',
      'uses' => 'CatalogosController@createnew',
    ]);

    Route::post('catalogo/proveedores', [
      'as' => 'catalogoproveedores.detalle',
      'uses' => 'CatalogosController@detalle',
    ]);


    /**********************************Ciudades**********************************/

    Route::resource('admin/ciudades', 'CiudadController');

    Route::get('admin/ciudades/delete/{id}', [
        'as' => 'admin.ciudades.delete',
        'uses' => 'CiudadController@destroy',
    ]);

    Route::get('admi/ciudades/listado', [
        'as' => 'admin.ciudades.listado',
        'uses' => 'CiudadController@listado',
    ]);


    /**********************************Sectores**********************************/

    Route::resource('admin/sectores', 'SectorController');

    Route::get('admin/sectores/delete/{id}', [
        'as' => 'admin.sectores.delete',
        'uses' => 'SectorController@destroy',
    ]);

    Route::get('admi/sectores/listado/{id}', [
        'as' => 'admin.sectores.listado',
        'uses' => 'SectorController@listado',
    ]);

    /**********************************Horas**********************************/

    Route::resource('admin/horas', 'HorasController');

    Route::get('admin/horas/delete/{id}', [
        'as' => 'admin.horas.delete',
        'uses' => 'HorasController@destroy',
    ]);

    /**********************************Dias**********************************/

    Route::resource('admin/dias', 'DiasController');

    Route::get('admin/dias/delete/{id}', [
        'as' => 'admin.dias.delete',
        'uses' => 'DiasController@destroy',
    ]);

    /**********************************Registro de Servicios y horario**********************************/


    Route::resource('usuario/servicios', 'UsuariosServiciosController');

    Route::get('usuariosServicios/{id}/delete', [
        'as' => 'usuario.servicios.delete',
        'uses' => 'UsuariosServiciosController@destroy',
    ]);

    Route::get('servicios/desplegable', [
        'as' => 'usuario.servicios.desplegable',
        'uses' => 'UsuariosServiciosController@desplegable',
    ]);


}); /****************************fin de admin *******************------------------------***/


/**********************************Mapa**********************************/

Route::get('geocoder', 'OtherGeocoderController@index');


Route::resource('catalogos', 'CatalogosController');

Route::get('catalogos/{id}/delete', [
    'as' => 'catalogos.delete',
    'uses' => 'CatalogosController@destroy',
]);

/*
Route::resource('catalogosInsumos', 'CatalogosInsumosController');

Route::get('catalogosInsumos/{id}/delete', [
    'as' => 'catalogosInsumos.delete',
    'uses' => 'CatalogosInsumosController@destroy',
]);
*/





Route::resource('horarios', 'HorariosController');

Route::get('horarios/{id}/delete', [
    'as' => 'horarios.delete',
    'uses' => 'HorariosController@destroy',
]);

/*
Route::resource('estados', 'EstadosController');

Route::get('estados/{id}/delete', [
    'as' => 'estados.delete',
    'uses' => 'EstadosController@destroy',
]);

Route::resource('municipios', 'MunicipiosController');

Route::get('municipios/{id}/delete', [
    'as' => 'municipios.delete',
    'uses' => 'MunicipiosController@destroy',
]);
*/

Route::resource('lugares', 'LugaresController');

Route::get('lugares/{id}/delete', [
    'as' => 'lugares.delete',
    'uses' => 'LugaresController@destroy',
]);




