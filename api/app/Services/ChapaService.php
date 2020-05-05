<?php

namespace App\Services;
use App\Chapa;
use Illuminate\Support\Str;

class ChapaService {

    public static function create($data) {
        $chapa = new Chapa();
        $chapa->nome = $data['nome'];
        $chapa->slogan = $data['slogan'];
        $chapa->ativo = 1;
        $chapa->slug = Str::slug($data['nome']);
        $chapa->save();

        return $chapa;
    }

    public static function update($data, $chapa) {
        if(isset($data['nome'])) {
            $chapa->nome = $data['nome'];
            $chapa->slug = Str::slug($data['nome']);
        }

        if(isset($data['slogan'])) $chapa->slogan = $data['slogan'];
        if(isset($data['ativo'])) $chapa->ativo = intval($data['ativo']);

        $chapa->update();

        return $chapa;
    }

    public static function delete($chapa) {
        $chapa->delete();
    }
}
