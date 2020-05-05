<?php

namespace App\Services;
use App\Participante;
use Illuminate\Support\Str;

class ParticipanteService {

    public static function create($data) {
        $participante = new Participante();
        $participante->nome = $data['nome'];
        $participante->chapa()->associate($data['chapa_id']);
        $participante->cargo()->associate($data['cargo_id']);
        $participante->slug = Str::slug($data['nome']);
        $participante->save();
        return $participante;
    }

    public static function update($data, $participante) {

    }

    public static function delete($participante) {

    }
}
