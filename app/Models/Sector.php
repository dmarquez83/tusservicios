<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Sector extends Model
{
    
	public $table = "sectores";
    

	public $fillable = [
	    "nombre",
		"ciudad_id"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
		"ciudad_id" => "integer"
    ];

	public static $rules = [
	    "nombre" => "required",
		"ciudad_id" => "required"
	];

	public function ciudades() {
		return $this->hasOne('App\Models\ciudad');
	}

}
