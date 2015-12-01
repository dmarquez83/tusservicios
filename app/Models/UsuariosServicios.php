<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class UsuariosServicios extends Model
{
    
	public $table = "usuarios_servicios";
    

	public $fillable = [
	    "servicio_id",
		"servicio_id",
		"user_id",
		"user_id"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "servicio_id" => "integer",
		"user_id" => "integer"
    ];

	public static $rules = [
	    
	];

}
