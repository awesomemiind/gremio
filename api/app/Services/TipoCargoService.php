<?php

namespace App\Services;
use App\TipoCargo;
use Illuminate\Support\Str;

class TipoCargoService {

    public static function create($data) {
        $tipoCargo = New TipoCargo();
        $tipoCargo->tipo = $data['tipo'];
        $tipoCargo->slug = Str::slug($data['tipo']);
        $tipoCargo->save();
        return $tipoCargo;
    }

    public static function update($data, $tipoCargo) {
        $tipoCargo->tipo = $data['tipo'];
        $tipoCargo->slug = Str::slug($data['tipo']);
        $tipoCargo->update();
        return $tipoCargo;
    }

    public static function delete($tipoCargo) {
        $tipoCargo->delete();
    }
}
