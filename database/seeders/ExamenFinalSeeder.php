<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ExamenFinalSeeder extends Seeder
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
                'fecha' => '2022-05-05',
                'hora' => '19:00',
                'ubicacion' => 'Complejo Alem',
                'observacion' => '',
                'id_profesor' => '3',
                'id_materia' => '3',
                'observacion' => 'Traer DNI.'
            ],
            [
                'fecha' => '2022-12-12',
                'hora' => '20:00',
                'ubicacion' => 'Palihue',
                'observacion' => '',
                'id_profesor' => '3',
                'id_materia' => '1',
                'observacion' => 'Deben traer sus computadoras.'
            ],

            [
                'fecha' => '2022-10-23',
                'hora' => '08:00',
                'ubicacion' => 'Palihue',
                'observacion' => '',
                'id_profesor' => '1',
                'id_materia' => '6',
                'observacion' => 'Coloquio - Pueden traer sus apuntes.'
            ],

            [
                'fecha' => '2022-09-12',
                'hora' => '08:00',
                'ubicacion' => 'Alem - Aula 13',
                'observacion' => '',
                'id_profesor' => '2',
                'id_materia' => '3',
                'observacion' => 'Presentarse 15 minutos antes.'
            ],
    ];

    DB::table('examenes_finales')->insert($data);

    }
}
