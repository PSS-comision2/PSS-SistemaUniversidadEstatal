<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class MateriaSeeder extends Seeder
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
                'nombre' => 'Proyectos de Sistemas de Software',
                'plan_pdf' => 'plan_PSS.pdf',
            ],
            [
                'nombre' => 'Matematica II',
                'plan_pdf' => 'plan_matematica.pdf',
            ],
            [
                'nombre' => 'Contabilidad Basica',
                'plan_pdf' => 'plan_contador.pdf',
            ],
    ];
    DB::table('materias')->insert($data);
    }
}