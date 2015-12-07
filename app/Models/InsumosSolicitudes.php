<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class InsumosSolicitudes extends Model
{
    
	public $table = "insumos_solicitudes";
    

	public $fillable = [
	    "insumo_id",
		"solicitud_id",
	    "created_at",
	    "updated_at",

	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "insumo_id" => "integer",
		"solicitud_id" => "integer",
	    "created_at",
	    "updated_at",
    ];

	public static $rules = [
	    
	];

}
