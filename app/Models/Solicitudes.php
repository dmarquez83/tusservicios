<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Solicitudes extends Model
{
    
	public $table = "solicitudes";
    

	public $fillable = [
	    "descripcion",
		"fecha",
		"hora",
		"direccion",
		"telefono",
		"horas",
		"costo",
		"id_usuario",
		"id_estatus",
		"id_servicio"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "descripcion" => "string",
		"hora" => "string",
		"direccion" => "string",
		"telefono" => "string",
		"horas" => "string",
		"id_usuario" => "integer",
		"id_estatus" => "integer",
		"id_servicio" => "integer"
    ];

	public static $rules = [
	    
	];

  	public function solicitudes_insumo() {
		return $this->hasMany('App\Models\Insumo');
  	}

	public function solicitudesinsumo() {
	  return $this->hasMany('App\Models\InsumosSolicitudes');
	}

	public function servicios()
	{
	  return $this->hasOne('App\Models\Servicios');
	}

}
