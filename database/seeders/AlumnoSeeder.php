<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AlumnoSeeder extends Seeder
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
                'LU' => '654321',
                'nombre' => 'Julieta',
                'apellido' => 'Perez',
                'DNI' => '40526987',
                'email' => 'juliperez@gmail.com',
                'celular' => '155893674',
                'password' => Hash::make('qwerty'),
            ],
            [
                'LU' => '789456',
                'nombre' => 'Marcos',
                'apellido' => 'Gonzalez',
                'DNI' => '25896143',
                'email' => 'marcosg@hotmail.com',
                'celular' => '156783415',
                'password' => Hash::make('ABC321'),
            ],
            [
                'LU' => '321456',
                'nombre' => 'Aldana',
                'apellido' => 'Borda',
                'DNI' => '69582130',
                'email' => 'aldiborda@yahoo.com',
                'celular' => '155236578',
                'password' => Hash::make('654321'),
            ],
    ];
    DB::table('alumnos')->insert($data);
    }
}
