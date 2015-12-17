<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Municipios extends Model
{
    
	public $table = "municipios";
    

	public $fillable = [
	    "codmun",
		"nommun",
		"codest",
		"codest"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "codmun" => "string",
		"nommun" => "string",
		"codest" => "integer"
    ];

	public static $rules = [
	    "codmun" => "required",
		"nommun" => "required"
	];

}
