<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Horas extends Model
{
    
	public $table = "horas";
    

	public $fillable = [
	    "hora"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "hora" => "string"
    ];

	public static $rules = [
	    "hora" => "required"
	];

}
