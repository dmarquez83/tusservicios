<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/





Route::resource("proveedores", "ProveedoresAPIController");

Route::resource("adminInsumosFotos", "adminInsumosFotoAPIController");

Route::resource("insumosFotos", "InsumosFotoAPIController");