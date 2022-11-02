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
                'created_at' => '2021-08-08',
                'LU_alumno' => '127589',
                'id_materia' => '2',
                'nota' => 'Aprobado',
            ],
            [
                'created_at' => '2021-02-17',
                'LU_alumno' => '116853',
                'id_materia' => '3',
                'nota' => 'Desaprobado',
            ],
            [
                'created_at' => '2021-08-23',
                'LU_alumno' => '127589',
                'id_materia' => '3',
                'nota' => 'Ausente',
            ],

            [
                'created_at' => '2022-04-16',
                'LU_alumno' => '116853',
                'id_materia' => '6',
                'nota' => 'Aprobado',
            ],

    ];

    DB::table('cursa')->insert($data);

    }
}
