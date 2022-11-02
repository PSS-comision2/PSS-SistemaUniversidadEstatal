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
                'LU' => '127589',
                'nombre' => 'Lautaro',
                'apellido' => 'Fernandez',
                'DNI' => '41737475',
                'email' => 'lfernandez@gmail.com',
                'celular' => '154747096',
                'password' => Hash::make('123'),
            ],
            [
                'LU' => '116853',
                'nombre' => 'Adrían',
                'apellido' => 'Duarte',
                'DNI' => '40643865',
                'email' => 'adrianduarte@hotmail.com',
                'celular' => '155847531',
                'password' => Hash::make('12345'),
            ],
            [
                'LU' => '106464',
                'nombre' => 'Matías',
                'apellido' => 'Lopez',
                'DNI' => '39754334',
                'email' => 'matilopez@yahoo.com',
                'celular' => '154064321',
                'password' => Hash::make('1111'),
            ],
            [
                'LU' => '123',
                'nombre' => 'Fermin',
                'apellido' => 'Alvarez',
                'DNI' => '123',
                'email' => '123@yahoo.com',
                'celular' => '154064321',
                'password' => Hash::make('123'),
            ],
    ];
    DB::table('alumnos')->insert($data);
    }
}
