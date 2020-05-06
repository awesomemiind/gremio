<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NivelTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TipoCargoTableSeeder::class);
        $this->call(ChapaTableSeeder::class);
        $this->call(ParticipanteTableSeeder::class);
    }
}
