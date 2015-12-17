<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Proveedores extends Model
{
    
	public $table = "proveedores";
    

	public $fillable = [
	    "rif",
		"nombre",
		"telefono",
		"direccion",
		"rnc",
		"correo"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "rif" => "string",
		"nombre" => "string",
		"telefono" => "string",
		"direccion" => "string",
		"rnc" => "string",
		"correo" => "string"
    ];

	public static $rules = [
	    "rif" => "required|max:10",
		"nombre" => "required|max:255",
		"correo" => "required|email"
	];

}
