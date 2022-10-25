<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class TieneSeeder extends Seeder
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
                'id_carrera' => '1',
                'id_materia' => '1',
               
            ],

            [
                'id_carrera' => '1',
                'id_materia' => '2',
                
            ],

            [
                'id_carrera' => '1',
                'id_materia' => '3',
                
            ],

        ];   
    DB::table('tiene')->insert($data);
    }
}
