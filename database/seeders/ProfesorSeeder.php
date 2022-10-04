<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class ProfesorSeeder extends Seeder
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
                'legajo' => '12345',
                'nombre' => 'Fernando',
                'apellido' => 'Gutierrez',
                'DNI' => '39754579',
                'email' => 'fgutierrez@gmail.com',
                'celular' => '154875466',
                'password' => Hash::make('abc'),
            ],
            [
                'legajo' => '67474',
                'nombre' => 'Gonzalo',
                'apellido' => 'Rodriguez',
                'DNI' => '35864563',
                'email' => 'grodriguez@hotmail.com',
                'celular' => '155746741',
                'password' => Hash::make('123ABC'),
            ],
            [
                'legajo' => '74742',
                'nombre' => 'Javier',
                'apellido' => 'Bustamante',
                'DNI' => '37548642',
                'email' => 'bustamantej@gmail.com',
                'celular' => '154856874',
                'password' => Hash::make('12345'),
            ],
    ];
    DB::table('profesores')->insert($data);
    }
}
