<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
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
                    'name' => 'Admin',
                    'email' => 'admin@admin.com',
                    'password' =>  Hash::make('admin'),
                ],
                [
                    'name' => 'user',
                    'email' => 'user@user.com',
                    'password' =>  Hash::make('user'),
                ],

        ];

        DB::table('users')->insert($data);
    }
}
