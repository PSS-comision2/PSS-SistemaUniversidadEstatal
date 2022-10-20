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
                'fecha_inicio' => '2021-08-08',
                'LU_alumno' => '127589',
                'id_materia' => '2',
            ],
            [
                'fecha_inicio' => '2021-02-17',
                'LU_alumno' => '116853',
                'id_materia' => '3',
            ],
            [
                'fecha_inicio' => '2021-08-23',
                'LU_alumno' => '127589',
                'id_materia' => '3',
            ],

    ];

    DB::table('cursa')->insert($data);

    }
}
