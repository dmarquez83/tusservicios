<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;


class Categoria extends Model
{

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



