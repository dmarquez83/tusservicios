<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Tipousuarios extends Model
{
    
	public $table = "tipousuarios";
    

	public $fillable = [
	    "nombre",
		"descripcion",
		"abreviatura"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "nombre" => "string",
		"descripcion" => "string",
		"abreviatura" => "string"
    ];

	public static $rules = [
	    
	];

   public function Users() {
	 return $this->belongsTo('App\Models\User');
   }

}
