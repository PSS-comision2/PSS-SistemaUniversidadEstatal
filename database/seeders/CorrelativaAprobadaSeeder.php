<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CorrelativaAprobadaSeeder extends Seeder
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
                'id_correlativa_fuerte'=>'3',
                'id_materia'=>'1',
                'id_carrera'=>'1',
            ],
    ];
    DB::table('correlativa_aprobadas')->insert($data);
    }
}