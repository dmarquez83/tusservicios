<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Lugares extends Model
{
    
	public $table = "lugares";
    

	public $fillable = [
	    "usuario_servicio_id",
		"usuario_servicio_id",
		"municipio_id",
		"municipio_id"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "usuario_servicio_id" => "integer",
		"municipio_id" => "integer"
    ];

	public static $rules = [
	    
	];

}
