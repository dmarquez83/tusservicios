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
    'as' => 'public.servicios.show',
    'uses' => 'PublicServiciosController@show'
]);



/*************************** ADMIN ***************************************/

Route::group(['middleware' => ['auth']], function()
{

    Route::get('admin/dashborad', ['as' => 'admin.dashborad','uses' => 'HomeController@dashboradAdmin']);

    /********************************** Categorias **********************************/
    Route::resource('admin/categorias', 'CategoriasController');

    Route::get('admin/categorias/delete/{id}', [
        'as' => 'admin.categorias.delete',
        'uses' => 'CategoriasController@destroy'
    ]);

    /**********************************tipo_servicios**************************/
    //Route::resource('admin/tiposServicio', 'TipoServicioController');
    Route::get('admin/tiposServicio/borrar/{id}', ['as' => 'tiposServicio.delete','uses' => 'TiposervicioController@destroy']);
    Route::get('admin/tiposServicio/servicios/{id}', ['as' => 'tiposServicio.servicios','uses' => 'TiposServicioController@services']);
    Route::put('admin/tiposServicio/servicios/{id}', ['as' => 'tiposServicio.update','uses' => 'TiposServicioController@update']);

    /**********************************Servicios**********************************/
    Route::resource('admin/servicios', 'ServiciosController');
    Route::get('admin/servicios/delete/{id}', ['as' => 'admin.servicios.delete','uses' => 'ServiciosController@destroy']);
    Route::get('admin/servicios/create/{id?}/', ['as' => 'admin.servicios.delete','uses' => 'ServiciosController@create']);


    /**********************************Tipo usuarios**********************************/
    Route::resource('admin/tipousuarios', 'TipousuariosController');
    Route::get('admin/tipousuarios/borrar/{id}', ['as' => 'tipousuarios.delete','uses' => 'TipousuariosController@destroy']);


    /****************************Evaluaciones**********************************/
    Route::resource('admin/evaluaciones', 'EvaluacionesController');
    Route::get('admin/evaluaciones/borrar/{id}', ['as' => 'evaluaciones.delete','uses' => 'EvaluacionesController@destroy']);

    /**********************************Ponderacions****************************/
    Route::resource('admin/ponderaciones', 'PonderacionController');
    Route::get('admin/ponderaciones/borrar/{id}', ['as' => 'ponderaciones.delete','uses' => 'PonderacionController@destroy']);

    /**********************************Estatus*********************************/
    Route::resource('admin/estatus', 'EstatuController');
    Route::get('admin/estatus/borrar/{id}', ['as' => 'estatus.delete','uses' => 'EstatuController@destroy']);

    /**********************************Insumos*********************************/
    Route::resource('admin/insumos', 'InsumoController');
    Route::get('admin/insumos/borrar/{id}', ['as' => 'insumos.delete','uses' => 'InsumoController@destroy']);

///////////ojo no he revisao esto
    Route::post('insumoSolicitudes/guardar', ['as' => 'insumoSolicitudes.getGuardar','uses' => 'InsumosSolicitudesController@getGuardar']);


    /**********************************Proveedores*******************************/
    Route::resource('admin/proveedores', 'ProveedoresController');
    Route::get('admin/proveedores/borrar/{id}', ['as' => 'admin.proveedores.delete','uses' => 'ProveedoresController@destroy']);
    Route::get('admin/insumos/listado', ['as' => 'admin.insumos.getListadoInsumos','uses' => 'InsumoController@getListadoInsumos']);

    Route::post('admin/proveedores/insumos', ['as' => 'admin.proveedores.insumos','uses' => 'ProveedoresController@storeInsumos']);

    /**********************************Proveedores Insumos **********************/
    /* Route::resource('proveedoresInsumos', 'ProveedoresInsumosController');
     Route::get('proveedoresInsumos/borrar/{id}', ['as' => 'proveedoresInsumos.delete','uses' => 'ProveedoresInsumosController@destroy']);*/


    /**********************************Horas**********************************/
    Route::resource('admin/horas', 'HorasController');
    Route::get('admin/horas/borrar/{id}', ['as' => 'admin.horas.delete','uses' => 'HorasController@destroy']);

    /**********************************Dias**********************************/
    Route::resource('admin/dias', 'DiasController');
    Route::get('admin/dias/borrar/{id}', ['as' => 'admin.dias.delete','uses' => 'DiasController@destroy']);

    /**********************************Ciudades**********************************/
    Route::resource('admin/ciudades', 'CiudadController');
    Route::get('admin/ciudades/borrar/{id}', ['as' => 'admin.ciudades.delete','uses' => 'CiudadController@destroy']);
    Route::get('admi/ciudades/listado', ['as' => 'admin.ciudades.listado','uses' => 'CiudadController@listado']);

    /**********************************Sectores**********************************/
    Route::resource('admin/sectores', 'SectorController');
    Route::get('admin/sectores/borrar/{id}', ['as' => 'admin.sectores.delete','uses' => 'SectorController@destroy']);
    #    Route::get('admi/sectores/listado/{id}', ['as' => 'admin.sectores.listado','uses' => 'SectorController@listado']);


    /**********************************Servicios con categorias**********************************/
    Route::resource('categorias/servicios', 'ServiciosController'); /*ojo con este se usa para grabar*/
    Route::get('categorias/servicios/{id}/delete', ['as' => 'categorias.servicios.delete','uses' => 'ServiciosController@destroy']); ///////////ojo no he revisao esto
    Route::get('categorias/desplegable', ['as' => 'categorias.servicios.desplegable','uses' => 'ServiciosController@desplegable']);


    /**********************************Lista de Solicitudes  + Registro de Catalogo**********************/
    Route::get('admin/solicitudes/listado', ['as' => 'solicitudes.listado','uses' => 'SolicitudesCategoriasController@listado']);
    Route::get('admin/solicitud/detalle/{id}', ['as' => 'solicitudes.getDetSolicitudAdmin','uses' => 'SolicitudesCategoriasController@getDetSolicitudAdmin']);

    /**********************************Catalogo Solicitud**********************************/
    Route::resource('admin/catalogos', 'CatalogosController');
    Route::get('admin/catalogos/crear/{id}', ['as' => 'catalogos.createnew','uses' => 'CatalogosController@createnew']);
    Route::post('catalogo/proveedores', ['as' => 'catalogoproveedores.detalle','uses' => 'CatalogosController@detalle']);


    /**********************************Asignar usuarios a una solicitud de servicios **********************************/
    Route::get('admin/solicitudes/asignar/{id}', ['as' => 'solicitudes.getAsignar','uses' => 'SolicitudesCategoriasController@getAsignar']);

    Route::post('admin/asignar/usuarios/{id}', ['as' => 'solicitudes.asignar','uses' => 'SolicitudesCategoriasController@asignar']);

    /**********************************Asignar usuarios a una solicitud de servicios **********************************/
    Route::get('admin/servicios/lugares/{id}', ['as' => 'lugares.getLugares','uses' => 'UsuariosServiciosController@getLugares']);

    Route::get('admin/servicios/horario/{id}', ['as' => 'lugares.getHorario','uses' => 'UsuariosServiciosController@getHorario']);



}); /****************************fin de admin *******************------------------------***/
