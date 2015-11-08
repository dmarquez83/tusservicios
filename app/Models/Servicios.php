<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Servicios extends Model
{
    
	public $table = "servicios";
    

	public $fillable = [
	    "nombre",
		"descripcion",
		"id_tipo_servicio",
		"id_estatus",
		"ponderacion",
	    "foto"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
		"descripcion" => "string",
		"id_tipo_servicio" => "integer",
		"id_estatus" => "integer",
		"ponderacion" => "integer",
	    "foto" => "string"
    ];

	public static $rules = [
	    
	];

}
