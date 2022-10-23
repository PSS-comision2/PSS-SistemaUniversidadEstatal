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
                'fecha' => '20-05-2022',
                'hora' => '19:00',
                'ubicacion' => 'Complejo Alem',
                'observacion' => '',
                'id_profesor' => '3',
                'id_materia' => '3',
                'observacion' => 'Traer DNI.'
            ],
            [
                'fecha' => '21-07-2022',
                'hora' => '20:00',
                'ubicacion' => 'Palihue',
                'observacion' => '',
                'id_profesor' => '3',
                'id_materia' => '1',
                'observacion' => 'Deben traer sus computadoras.'
            ],

            [
                'fecha' => '23-10-2022',
                'hora' => '08:00',
                'ubicacion' => 'Palihue',
                'observacion' => '',
                'id_profesor' => '1',
                'id_materia' => '6',
                'observacion' => 'Coloquio - Pueden traer sus apuntes.'
            ],

            [
                'fecha' => '12-09-2022',
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
