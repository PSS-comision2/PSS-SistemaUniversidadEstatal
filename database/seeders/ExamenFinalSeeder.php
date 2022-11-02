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
                'fecha' => '2022-12-20',
                'hora' => '19:00',
                'ubicacion' => 'Complejo Alem',
                'id_profesor' => '3',
                'id_materia' => '3',
                'observacion' => 'Traer DNI.'
            ],
            [
                'fecha' => '2022-12-26',
                'hora' => '20:00',
                'ubicacion' => 'Palihue',
                'id_profesor' => '3',
                'id_materia' => '1',
                'observacion' => 'Deben traer sus computadoras.'
            ],

            [
                'fecha' => '2022-11-30',
                'hora' => '08:00',
                'ubicacion' => 'Palihue',
                'id_profesor' => '1',
                'id_materia' => '6',
                'observacion' => 'Coloquio - Pueden traer sus apuntes.'
            ],

            [
                'fecha' => '2022-12-28',
                'hora' => '08:00',
                'ubicacion' => 'Alem - Aula 13',
                'id_profesor' => '2',
                'id_materia' => '3',
                'observacion' => 'Presentarse 15 minutos antes.'
            ],

            [
                'fecha' => '2023-03-15',
                'hora' => '08:00',
                'ubicacion' => 'Alem - Aula 18',
                'id_profesor' => '3',
                'id_materia' => '6',
                'observacion' => 'Presentarse 15 minutos antes.'
            ],
    ];

    DB::table('examenes_finales')->insert($data);

    }
}
