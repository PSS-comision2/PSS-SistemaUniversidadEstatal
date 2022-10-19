<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class InscriptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'LU_alumno' => '127589',
                'id_carrera' => '1',
            ],
            [
                'LU_alumno' => '127589',
                'id_carrera' => '2',
            ],
            [
                'LU' => '106464',
                'id_carrera' => '3',
            ],
    ];
    DB::table('inscripto')->insert($data);
    }
}
