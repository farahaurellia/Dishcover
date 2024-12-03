<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StepsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('steps')->insert([
            ['recipe_id' => 1, 'nomor_urut' => 1, 'deskripsi_langkah' => 'Panaskan minyak dalam wajan'],
            ['recipe_id' => 1, 'nomor_urut' => 2, 'deskripsi_langkah' => 'Tumis bawang putih dan bawang merah hingga harum'],
            ['recipe_id' => 1, 'nomor_urut' => 3, 'deskripsi_langkah' => 'Masukkan telur, buat orak-arik'],
            // Add the rest of the steps entries here...
        ]);
    }
}
