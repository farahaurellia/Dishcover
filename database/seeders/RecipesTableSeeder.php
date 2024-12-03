<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecipesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('recipes')->insert([
            ['user_id' => 1, 'judul' => 'Nasi Goreng Spesial', 'deskripsi' => 'Nasi goreng dengan bumbu rahasia', 'image_url' => 'https://i.pinimg.com/736x/94/82/ab/9482ab2e248d249e7daa7fd6924c8d3b.jpg', 'porsi' => 2, 'waktu' => 30],
            ['user_id' => 1, 'judul' => 'Ayam Bakar Madu', 'deskripsi' => 'Ayam bakar dengan olesan madu','image_url' => 'https://i.pinimg.com/736x/5b/a1/71/5ba1715298513331e0089ffb4a7a3bdb.jpg', 'porsi' => 4, 'waktu' => 60],
            ['user_id' => 2, 'judul' => 'Soto Ayam', 'deskripsi' => 'Soto ayam khas Jawa', 'image_url' => 'https://i.pinimg.com/236x/1d/e4/a1/1de4a19e2d70724d71ad912cec05885d.jpg', 'porsi' => 6, 'waktu' => 90],
            // Add the rest of the recipe entries here...
        ]);
    }
}
