<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Evaluaciones extends Model
{
    
	public $table = "evaluaciones";
    

	public $fillable = [
	    "valor",
		"nombre"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "valor" => "integer",
		"nombre" => "string"
    ];

	public static $rules = [
	    
	];

}
