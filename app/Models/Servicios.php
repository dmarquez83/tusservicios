<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Sofa\Eloquence\Eloquence;

class Servicios extends Model
{

	use Eloquence;

	// no need for this, but you can define default searchable columns:
	protected $searchableColumns = ['nombre', 'descripcion'];
    
	public $table = "servicios";
    

	public $fillable = [
	    "nombre",
		"descripcion",
		"id_tipo_servicio",
		"id_estatus",
		"ponderacion",
	    "foto",
	    "precio"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
		"descripcion" => "string",
		"id_tipo_servicio" => "integer",
		"id_estatus" => "integer",
		"ponderacion" => "integer",
	    "foto" => "string",
	    "precio" => "float",
    ];

	public static $rules = [
	    
	];

    public function insumos() {
		return $this->hasMany('App\Models\InsumosServicios');
    }

	public function solicitud()
	{
		return $this->hasMany('App\Models\Solicitudes');
	}

	public function tipoServicio(){
		return $this->belongsTo('App\Models\TiposServicio','id_tipo_servicio');
	}

	public function categoria(){

		$tipo = $this->tipoServicio();

		return $tipo->categoria();

	}

}
