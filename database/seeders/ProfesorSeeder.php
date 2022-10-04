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
                'legajo' => '125609',
                'name' => 'Juan',
                'apellido' => 'Perez',
                'DNI' => '42567890',
                'email' => 'juan@hotmail.com',
                'celular' => '23926525',
                'password' => Hash::make('123'),
            ],
    ];
    DB::table('profesores')->insert($data);
    }
}
