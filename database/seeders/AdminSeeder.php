<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'identity' => 'admin@jaka',
            'name' => 'admin',
            'email' => 'admin@jaka',
            'password' => Hash::make('jakaadminkece#0'),
            'status' => 'admin' 
        ]);

        DB::table('users')->insert([
            'identity' => '195150200',
            'name' => 'adinaelah',
            'email' => 'falvracoadin@gmail.com',
            'password' => Hash::make('q1a2z3'),
            'status' => 'mahasiswa'
        ]); 
    }
}
