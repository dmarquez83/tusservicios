<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class InsumosServicios extends Model
{
    
	public $table = "insumos_servicios";
    

	public $fillable = [
	    "insumo_id",
		"insumo_id",
		"servicio_id",
		"servicio_id"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "insumo_id" => "integer",
		"servicio_id" => "integer"
    ];

	public static $rules = [
	    
	];

  public function serviciosinsumos() {
	return $this->belongsToMany('App\Models\Insumo');
  }

  public function insumosservicios() {
	return $this->belongsToMany('App\Models\Servicios');
  }


}
