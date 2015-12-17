<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Dias extends Model
{
    
	public $table = "dias";
    

	public $fillable = [
	    "dia"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "dia" => "string"
    ];

	public static $rules = [
	    "dia" => "required"
	];

}
