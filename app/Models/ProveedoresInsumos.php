<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class ProveedoresInsumos extends Model
{
    
	public $table = "proveedores_insumos";
    

	public $fillable = [
	    "proveedor_id",
		"proveedor_id",
		"insumo_id",
		"insumo_id"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "proveedor_id" => "integer",
		"insumo_id" => "integer"
    ];

	public static $rules = [
	    
	];

}
