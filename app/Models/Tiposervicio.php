<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Tiposervicio extends Model
{
    
	public $table = "tiposervicios";
    

	public $fillable = [
	    "nombre",
		"descripcion",
		"id_categoria"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
		"descripcion" => "string",
		"id_categoria" => "integer"
    ];

	public static $rules = [
	    "nombre" => "validator",
		"descripcion" => "validator",
		"id_categoria" => "validator"
	];

}
