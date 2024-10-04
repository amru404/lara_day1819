<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'nama' =>  'serum skintific',
                'harga' => 200000,
                'stock' => 50,
                'kategori' => 'kecantikan',
            ],

            [
                'nama' =>  'Helm',
                'harga' => 750000,
                'stock' => 50,
                'kategori' => 'olahraga',
            ],

            [
                'nama' =>  'Sepatu',
                'harga' => 480000,
                'stock' => 50,
                'kategori' => 'olahraga',
            ],
        ]);
    }
}
