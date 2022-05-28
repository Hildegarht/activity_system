<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Hilda Amadu",
            'email' => 'hilda@email.com',
            'password' => Hash::make('hildaamadu'),
        ]);
        DB::table('users')->insert([
            'name' => "Npontu Tech",
            'email' => 'npontu@email.com',
            'password' => Hash::make('npontutech'),
        ]);
    }
}
