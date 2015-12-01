<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Catalogos extends Model
{
    
	public $table = "catalogos";
    

	public $fillable = [
	    "descripcion",
		"solicitud_id",
		"solicitud_id",
		"estatus_id",
		"estatus_id"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "descripcion" => "string",
		"solicitud_id" => "integer",
		"estatus_id" => "integer"
    ];

	public static $rules = [
	    "descripcion" => "required"
	];

}
