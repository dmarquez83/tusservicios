<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;


class Insumo extends Model
{
    
	public $table = "insumos";
    

	public $fillable = [
	    "descripcion",
		"referencia",
	    "foto"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "descripcion" => "string",
		"referencia" => "string",
	    "foto" => "string"
    ];

	public static $rules = [

	];

  public function insumo_solicitudes(){
	return $this->belongsTo('App\Models\Solicitudes');
  }

  public function insumos_servicios() {
	return $this->hasMany('App\Models\InsumosServicios');
  }

}
