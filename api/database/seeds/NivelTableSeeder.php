<?php

use Illuminate\Database\Seeder;
use App\Nivel;

class NivelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nivel::create(['tipo' => 'admin']);
        Nivel::create(['tipo' => 'colaborador']);
        Nivel::create(['tipo' => 'aluno']);
    }
}
