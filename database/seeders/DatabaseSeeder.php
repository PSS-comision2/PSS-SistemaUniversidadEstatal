<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ProfesorSeeder::class);
        $this->call(AlumnoSeeder::class);
        $this->call(MateriaSeeder::class);
        $this->call(CarreraSeeder::class);
        $this->call(ExamenFinalSeeder::class);
        $this->call(RindeSeeder::class);
        $this->call(DictaSeeder::class);
        $this->call(CursaSeeder::class);
        $this->call(InscriptoSeeder::class);
    }
}
