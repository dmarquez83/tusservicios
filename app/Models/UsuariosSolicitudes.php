<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class UsuariosSolicitudes extends Model
{
  public $table = "usuarios_solicitudes";


  public $fillable = [
    "solicitud_id",
    "user_id",
    "id_estatus"
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    "solicitud_id" => "integer",
    "user_id" => "integer",
    "id_estatus" => "integer",
  ];

  public static $rules = [

  ];

}
