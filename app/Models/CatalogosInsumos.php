<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class CatalogosInsumos extends Model
{
    
	public $table = "catalogos_insumos";
    

	public $fillable = [
		"proveedor_id",
		"proveedor_id",
		"insumo_id",
		"insumo_id",
		"estatus_id",
		"estatus_id",
		"catalogo_id",
		"catalogo_id",
		"precio",
	    "foto"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
		"proveedor_id" => "integer",
		"insumo_id" => "integer",
		"estatus_id" => "integer",
		"catalogo_id" => "integer",
	    "foto" => "string"
    ];

	public static $rules = [

	];

}
