<?php

use Illuminate\Database\Seeder;
use App\Chapa;
use App\Services\ChapaService;
use Faker\Generator as Faker;

class ChapaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chapas = ['Chapa um', 'Chapa dois'];
        foreach ($chapas as $chapa) {
            Chapa::create([
                'nome' => $chapa,
                'slogan' => 'Alguma frase',
                'ativo' => 1,
                'slug' => Str::slug($chapa)
            ]);
        }
    }
}
