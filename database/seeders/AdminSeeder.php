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
                'name' => 'Nicolás',
                'apellido' => 'González',
                'DNI' => '35753578',
                'usuario' => 'admin1',
                'email' => 'nicogonzalez@gmail.com',
                'celular' => '154748653',
                'password' =>  Hash::make('ng2000'),
            ],

    ];

    DB::table('administradores')->insert($data);

    }
}
