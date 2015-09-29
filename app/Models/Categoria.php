<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Categoria extends Model
{
    
	public $table = "categorias";
    

	public $fillable = [
	    "nombre",
		"decripcion"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
		"decripcion" => "string"
    ];

	public static $rules = [

	];

}
