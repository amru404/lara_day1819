<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //admin
            [
                'name' =>  'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],

            //penjual
            [
                'name' =>  'penjual',
                'email' => 'penjual@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'penjual',
            ],

            //pembeli
            [
                'name' =>  'pembeli',
                'email' => 'pembeli@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pembeli',
            ]
        ]);
    }
}
