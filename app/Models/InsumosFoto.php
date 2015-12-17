<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class InsumosFoto extends Model
{
    
	public $table = "insumos_fotos";
    

	public $fillable = [
	    "insumo_id",
		"insumo_id",
		"foto"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "insumo_id" => "integer",
		"foto" => "string"
    ];

	public static $rules = [
	    
	];

}
