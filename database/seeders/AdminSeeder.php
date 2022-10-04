<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
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
                'nombre' => 'Nicolás',
                'apellido' => 'González',
                'DNI' => '35753578',
                'usuario' => 'admin1',
                'email' => 'nicogonzalez@gmail.com',
                'celular' => '154748653',
                'password' =>  Hash::make('ng2000'),
            ],
            [
                'nombre' => 'Roberto',
                'apellido' => 'Cuenca',
                'DNI' => '37464679',
                'usuario' => 'admin2',
                'email' => 'robertoc@hotmail.com',
                'celular' => '155764379',
                'password' =>  Hash::make('A1/+'),
            ],
            [
                'nombre' => 'Santiago',
                'apellido' => 'Jimenez',
                'DNI' => '40643674',
                'usuario' => 'admin3',
                'email' => 'santijimenez@gmail.com',
                'celular' => '15465357',
                'password' =>  Hash::make('123'),
            ],

    ];

    DB::table('administradores')->insert($data);

    }
}
