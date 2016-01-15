<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Horarios extends Model
{
    
	public $table = "horarios";
    

	public $fillable = [
	    "usuario_servicio_id",
		"hora_id",
		"dia_id"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "usuario_servicio_id" => "integer",
		"hora_id" => "integer",
		"dia_id" => "integer"
    ];

	public static $rules = [
	    
	];

}
