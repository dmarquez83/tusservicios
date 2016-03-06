<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Sofa\Eloquence\Eloquence;


class Categoria extends Model
{
	use Eloquence;

	// no need for this, but you can define default searchable columns:
	protected $searchableColumns = ['nombre', 'descripcion'];

	public $table = "categorias";


	public $fillable = [
		"nombre",
		"descripcion",
		"foto"
	];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		"nombre" => "string",
		"descripcion" => "string",
		"foto"  => "string",
	];

	public static $rules = [

	];

	public function tiposServicio() {
		return $this->hasMany('App\Models\TiposServicio', 'id_categoria');
	}

}



