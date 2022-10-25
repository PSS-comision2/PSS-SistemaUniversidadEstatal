<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CursaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'fecha_inicio' => '2022-03-16',
                'LU_alumno' => '127589',
                'id_materia' => '2',
            ],
            [
                'fecha_inicio' => '2022-04-17',
                'LU_alumno' => '116853',
                'id_materia' => '3',
            ],
            [
                'fecha_inicio' => '2022-03-17',
                'LU_alumno' => '127589',
                'id_materia' => '3',
            ],

            [
                'fecha_inicio' => '2022-04-16',
                'LU_alumno' => '116853',
                'id_materia' => '6',
            ],

    ];

    DB::table('cursa')->insert($data);

    }
}
