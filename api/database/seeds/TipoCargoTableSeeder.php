<?php

use Illuminate\Database\Seeder;
use App\TipoCargo;
use App\Services\TipoCargoService;
use Illuminate\Support\Str;

class TipoCargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoCargos = ['diretor','vice diretor'];
        foreach ($tipoCargos as $tipoCargo) {
            $data = ['tipo' => $tipoCargo];
            TipoCargoService::create($data);
        }
    }
}
