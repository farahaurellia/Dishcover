<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IngredientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ingredients')->insert([
            ['recipe_id' => 1, 'nama_bahan' => 'Nasi Putih', 'jumlah' => 2, 'satuan' => 'piring'],
            ['recipe_id' => 1, 'nama_bahan' => 'Telur', 'jumlah' => 2, 'satuan' => 'butir'],
            ['recipe_id' => 1, 'nama_bahan' => 'Bawang Putih', 'jumlah' => 3, 'satuan' => 'siung'],
            // Add the rest of the ingredients entries here...
        ]);
    }
}
