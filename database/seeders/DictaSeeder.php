<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DictaSeeder extends Seeder
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
                'legajo' => '74742',
                'id_materia' => '2',
            ],
            [
                'legajo' => '74742',
                'id_materia' => '3',
            ],

    ];

    DB::table('dicta')->insert($data);

    }
}
