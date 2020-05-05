<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Participante extends Model
{
    protected $table = 'participantes';
    protected $fillable = ['nome', 'chapa_id', 'cargo_id', 'slug'];

    public $timestamps = true;

    public function setNomeAttribute($value) {
        $this->attributes['nome'] = strtolower($value);
    }

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug($value);
    }
}
