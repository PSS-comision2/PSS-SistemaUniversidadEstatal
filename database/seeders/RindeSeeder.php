<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RindeSeeder extends Seeder
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
                'LU_alumno' => '127589',
                'id_final' => '1',
            ],
            [
                'LU_alumno' => '116853',
                'id_final' => '1',
            ],

    ];

    DB::table('rinde')->insert($data);

    }
}
