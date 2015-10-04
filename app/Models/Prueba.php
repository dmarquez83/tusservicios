<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Prueba extends Model
{
    
	public $table = "pruebas";
    

	public $fillable = [
	    "nombre",
		"categoria"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
		"categoria" => "integer"
    ];

	public static $rules = [
	    
	];

}
