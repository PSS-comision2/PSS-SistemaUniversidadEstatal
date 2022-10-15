<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class CarreraSeeder extends Seeder
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
                'nombre' => 'Ingenieria en Sistemas de Informacion',
                'numero_plan' => '5',
                'departamento' => 'Ciencias e Ingenieria de la Computacion',
            ],
            [
                'nombre' => 'Ingenieria Agronomica',
                'numero_plan' => '18',
                'departamento' => 'Agronomia',
            ],
            [
                'nombre' => 'Contador Publico',
                'numero_plan' => '3',
                'departamento' => 'Ciencias de la Administracion',
            ],
    ];
    DB::table('carreras')->insert($data);
    }
}
