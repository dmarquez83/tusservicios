<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Estados extends Model
{
    
	public $table = "estados";
    

	public $fillable = [
	    "codest",
		"nomest"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "codest" => "string",
		"nomest" => "string"
    ];

	public static $rules = [
	    "codest" => "required",
		"nomest" => "required"
	];

}
