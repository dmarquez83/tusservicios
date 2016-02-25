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

	  public function tiposervicio() {
		return $this->hasMany('App\Models\Tiposervicio', 'id_categoria');
	  }


	/**
	 * Set the foto
	 *
	 * @param  string  $value
	 * @return string
	 */
	/*public function setFotoAttribute($value)
	{
		if (! empty ($value))
		{
			$this->attributes['foto'] = strtolower($value);
		}
	}*/
    /* esto es para procesar los valores al momento de guardalos automaticamente lo toma sin llamarlo ni nada*/

}



