<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'identity' => '195150200',
            'name' => 'M rosyid',
            'email' => 'adin@gmail.com',
            'status' => 'mahasiswa',
            'password' => Hash::make('q1a2z3')
        ]);
    }
}
