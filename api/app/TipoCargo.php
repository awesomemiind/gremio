<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCargo extends Model
{
  protected $table = 'tipo_cargos';
  protected $fillable = ['tipo'];

  public $timestamps = false;

  public function setTipoAttribute($value) {
    $this->attributes['tipo'] = strtolower($value);
  }
}
