<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class TiposServicio extends Model
{
    
	public $table = "tiposervicios";
    

	public $fillable = [
	    "nombre",
		"descripcion",
		"id_categoria"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
		"descripcion" => "string",
		"id_categoria" => "integer"
    ];

	public static $rules = [

	];

	public function categoria() {
	  return $this->belongsTo('App\Models\Categoria','id_categoria');
	}

	public function servicios(){
		return $this->hasMany('App\Models\Servicios','id_tipo_servicio');
	}

}
