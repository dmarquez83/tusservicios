<?php
/*-- Rutas de Acceso Publico --*/

Route::get('/', ['as' => 'home','uses' => 'HomeController@index',]);
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index',]);
Route::get('buscar/categorias',  ['uses' => 'SearchController@categorias','as' => 'buscar-categorias']);
Route::get('buscar/servicios/{id}', ['uses' => 'SearchController@servicios', 'as' => 'buscar-servicios']);

// Lista de Servicios //revisar si se esta utilizando
Route::get('public/servicios/listar', ['as' => 'listar','uses' => 'ServiciosController@listar']);

// Detalle de Servicio //revisar si se esta utilizando
Route::get('public/servicios/{id}', ['as' => 'detalle', 'uses' => 'ServiciosController@detalle']);

/**********************************dashborad carolina**********************************/

Route::get('public/dashborad',function () { return view('dashborad.tableusuario');});
Route::get('admin/dashborad',function () { return view('dashborad.tableadmin'); });
Route::get('public/dashborad/proveedor',function () { return view('dashborad.tableproveedor'); });
Route::get('public/dashborad/consultor',function () { return view('dashborad.tableconsultor'); });

/**********************************solicitudes**********************************/

// Categorias
Route::resource('public/categorias', 'SolicitudesCategoriasController' , ['as' => 'categorias']);
Route::get('public/categorias', ['as' => 'categorias.index','uses' => 'SolicitudesCategoriasController@index',]);
Route::get('public/categorias/{id}', ['as' => 'detalle-categorias','uses' => 'ServiciosController@detallecategorias',]);

// Servicios
Route::resource('public/servicios', 'SolicitudServiciosController', ['as' => 'servicios']);
Route::get('servicios/index/{id}', ['as' => 'servicios.index','uses' => 'SolicitudServiciosController@index',]);

//solicitudes
Route::get('solicitudes/nuevo/{id}', ['as' => 'solicitudes.create', 'uses' => 'SolicitudesCategoriasController@create',]);
Route::get('solicitudes/detPago/{id}', ['as' => 'solicitudes.detPago', 'uses' => 'SolicitudesCategoriasController@detPago',]);
Route::get('solicitudes/guardar/{id}', ['middleware' => 'authusuario','as' => 'solicitudes.store','uses' => 'SolicitudesCategoriasController@store',]);

/*******************************LOGIN******************************************/
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', [ 'as' => 'auth/login','uses' => 'Auth\AuthController@postLogin',]);
Route::get('public/logout', ['as' => 'auth/logout','uses' => 'Auth\AuthController@getLogout',]);
Route::get('public/registro', ['as' => 'auth/register','uses' => 'Auth\AuthController@getRegister',]);
Route::post('public/registro', ['as' => 'auth/register','uses' => 'Auth\AuthController@postRegister',]);
Route::get('public/password', [ 'as' => 'password/email', 'uses' => 'Auth\PasswordController@getEmail',]);
Route::post('public/password', ['as' => 'password/postEmail','uses' => 'Auth\PasswordController@postEmail']);
// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', ['as' => 'password/postReset', 'uses' =>  'Auth\PasswordController@postReset']);
//Socialite
Route::get('login/{provider}',['uses' => 'Auth\AuthController@login','as'   => 'auth.getSocialAuth']);
// CLIENTE

/**********************************Lista de Solicitudes  + Registro de Catalogo**********************/
Route::get('user/solicitudes/listado', ['as' => 'solicitudes.getlistado','uses' => 'SolicitudesCategoriasController@getListado']);
Route::get('user/solicitud/detalle/{id}', ['as' => 'solicitudes.getDetSolicitud','uses' => 'SolicitudesCategoriasController@getDetSolicitud']);

Route::get('user/solicitud/servicios', ['as' => 'solicitudes.getUsuariosSolicitudes','uses' => 'UsuariosServiciosController@getUsuariosSolicitudes']);

/**********************************Registro de Servicios y horario**********************************/
Route::resource('usuario/servicios', 'UsuariosServiciosController'); /*cambiar a user*/
Route::get('usuariosServicios/borrar/{id}', ['as' => 'usuario.servicios.delete','uses' => 'UsuariosServiciosController@destroy']);
Route::get('servicios/desplegable', ['as' => 'usuario.servicios.desplegable','uses' => 'UsuariosServiciosController@desplegable']);
// ADMIN ------------------------------------------------------------------------------------

Route::group(['middleware' => ['auth']], function()
{
    /**********************************Categoria**********************************/
    Route::resource('admin/categorias', 'CategoriaController');
    Route::get('admin/categorias/{id}/delete', ['as' => 'admin.categorias.delete','uses' => 'CategoriaController@destroy']);

    /**********************************Tipo usuarios**********************************/
    Route::resource('tipousuarios', 'TipousuariosController');
    Route::get('tipousuarios/{id}/delete', ['as' => 'tipousuarios.delete','uses' => 'TipousuariosController@destroy']);

    /**********************************tipo_servicios**************************/
    Route::resource('tiposervicios', 'TiposervicioController');
    Route::get('tiposervicios/createnew/{id}', ['as' => 'tiposervicios.createnew','uses' => 'TiposervicioController@createnew']);
    Route::post('tiposervicios/storenew/{id}', ['as' => 'tiposervicios.storenew','uses' => 'TiposervicioController@storenew']);

    Route::get('tiposerviciost/indextiposervicio', ['as' => 'tiposerviciost.indextiposervicio','uses' => 'TiposervicioController@indextiposervicio']);//ojo buscar si la utilizo

    Route::get('tiposervicios/borrar/{id}', ['as' => 'tiposervicios.delete','uses' => 'TiposervicioController@destroy']);

    /**********************************Ponderacions****************************/
    Route::resource('ponderaciones', 'PonderacionController');
    Route::get('ponderaciones/borrar/{id}', ['as' => 'ponderaciones.delete','uses' => 'PonderacionController@destroy']);

    /**********************************Estatus*********************************/
    Route::resource('estatus', 'EstatuController');
    Route::get('estatus/borrar/{id}', ['as' => 'estatus.delete','uses' => 'EstatuController@destroy']);

    /**********************************Servicios**********************************/
    Route::resource('admin/servicios', 'ServiciosAdminController');
    Route::get('admin/servicios/nuevo/{id}', ['as' => 'admin.servicios.create','uses' => 'ServiciosAdminController@create']);
    /**********************************Servicios con categorias**********************************/
    Route::resource('categorias/servicios', 'ServiciosController'); /*ojo con este se usa para grabar*/
    Route::get('categorias/servicios/{id}/delete', ['as' => 'categorias.servicios.delete','uses' => 'ServiciosController@destroy']);
    Route::get('categorias/desplegable', ['as' => 'categorias.servicios.desplegable','uses' => 'ServiciosController@desplegable']);

    /****************************Evaluaciones**********************************/
    Route::resource('evaluaciones', 'EvaluacionesController');
    Route::get('evaluaciones/borrar/{id}', ['as' => 'evaluaciones.delete','uses' => 'EvaluacionesController@destroy']);

    /**********************************Insumos*********************************/
    Route::resource('insumos', 'InsumoController');
    Route::get('insumos/borrar/{id}', ['as' => 'insumos.delete','uses' => 'InsumoController@destroy']);
    Route::post('solicitud/insumos', ['as' => 'insumosSolicitudes.detalle','uses' => 'InsumosSolicitudesController@detalle']);
    Route::post('insumoSolicitudes/guardar', ['as' => 'insumoSolicitudes.getGuardar','uses' => 'InsumosSolicitudesController@getGuardar']);

    /**********************************Proveedores*******************************/
    Route::resource('admin/proveedores', 'ProveedoresController');
    Route::get('admin/proveedores/borrar/{id}', ['as' => 'admin.proveedores.delete','uses' => 'ProveedoresController@destroy']);
    Route::get('admin/insumos/listado', ['as' => 'admin.insumos.getListadoInsumos','uses' => 'InsumoController@getListadoInsumos']);

    /**********************************Proveedores Insumos **********************/
   /* Route::resource('proveedoresInsumos', 'ProveedoresInsumosController');
    Route::get('proveedoresInsumos/borrar/{id}', ['as' => 'proveedoresInsumos.delete','uses' => 'ProveedoresInsumosController@destroy']);*/

    /**********************************Lista de Solicitudes  + Registro de Catalogo**********************/
    Route::get('admin/solicitudes/listado', ['as' => 'solicitudes.listado','uses' => 'SolicitudesCategoriasController@listado']);

    /**********************************Catalogo Solicitud**********************************/
    Route::resource('admin/catalogos', 'CatalogosController');
    Route::get('admin/catalogos/crear/{id}', ['as' => 'catalogos.createnew','uses' => 'CatalogosController@createnew']);
    Route::post('catalogo/proveedores', ['as' => 'catalogoproveedores.detalle','uses' => 'CatalogosController@detalle']);


    /**********************************Asignar usuarios a una solicitud de servicios **********************************/
    Route::get('admin/solicitudes/asignar/{id}', ['as' => 'solicitudes.getAsignar','uses' => 'SolicitudesCategoriasController@getAsignar']);

    Route::post('admin/asignar/usuarios/{id}', ['as' => 'solicitudes.asignar','uses' => 'SolicitudesCategoriasController@asignar']);

    /**********************************Ciudades**********************************/
    Route::resource('admin/ciudades', 'CiudadController');
    Route::get('admin/ciudades/borrar/{id}', ['as' => 'admin.ciudades.delete','uses' => 'CiudadController@destroy']);
    Route::get('admi/ciudades/listado', ['as' => 'admin.ciudades.listado','uses' => 'CiudadController@listado']);

    /**********************************Sectores**********************************/
    Route::resource('admin/sectores', 'SectorController');
    Route::get('admin/sectores/borrar/{id}', ['as' => 'admin.sectores.delete','uses' => 'SectorController@destroy']);
    Route::get('admi/sectores/listado/{id}', ['as' => 'admin.sectores.listado','uses' => 'SectorController@listado']);

    /**********************************Horas**********************************/
    Route::resource('admin/horas', 'HorasController');
    Route::get('admin/horas/borrar/{id}', ['as' => 'admin.horas.delete','uses' => 'HorasController@destroy']);

    /**********************************Dias**********************************/
    Route::resource('admin/dias', 'DiasController');
    Route::get('admin/dias/borrar/{id}', ['as' => 'admin.dias.delete','uses' => 'DiasController@destroy']);



}); /****************************fin de admin *******************------------------------***/