<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Estatu extends Model
{
    
	public $table = "estatus";
    

	public $fillable = [
	    "nombre",
		"descripcion"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
		"descripcion" => "string"
    ];

	public static $rules = [
	    "nombre" => "requiere"
	];

}
