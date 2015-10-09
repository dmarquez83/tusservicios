<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class fernando extends Model
{
    
	public $table = "fernandos";
    

	public $fillable = [
	    "nombre",
		"descr"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
		"descr" => "string"
    ];

	public static $rules = [
	    
	];

}
