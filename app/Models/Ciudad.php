<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Ciudad extends Model
{
    
	public $table = "ciudades";
    

	public $fillable = [
	    "nombre"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string"
    ];

	public static $rules = [
	    "nombre" => "required"
	];

	public function sectores() {
		return $this->hasMany('App\Models\Sector');
	}

}
