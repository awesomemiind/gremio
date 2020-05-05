<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapa extends Model
{
    protected $table = 'chapas';
    protected $fillable = ['nome', 'slogan', 'ativo', 'slug'];
  
    public $timestamps = true;

    public function setNomeAttribute($value) {
        $this->attributes['nome'] = strtolower($value);
    }

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = strtolower($value);
    }
}
