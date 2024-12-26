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
            ['user_id' => 3, 'judul' => 'Ayam Bakar Madu', 'deskripsi' => 'Ayam bakar dengan olesan madu', 'image_url' => 'https://i.pinimg.com/736x/5b/a1/71/5ba1715298513331e0089ffb4a7a3bdb.jpg', 'porsi' => 4, 'waktu' => 60],
            ['user_id' => 2, 'judul' => 'Soto Ayam', 'deskripsi' => 'Soto ayam khas Jawa', 'image_url' => 'https://i.pinimg.com/236x/1d/e4/a1/1de4a19e2d70724d71ad912cec05885d.jpg', 'porsi' => 6, 'waktu' => 90],
            ['user_id' => 5, 'judul' => 'Smoothie Mangga', 'deskripsi' => 'Smoothie mangga yang segar dan manis, sempurna untuk menyegarkan diri di pagi hari.', 'image_url' => 'https://i.pinimg.com/736x/6a/0f/82/6a0f82c91a31ec36b540924211b99b75.jpg', 'porsi' => 2, 'waktu' => 10],
            ['user_id' => 8, 'judul' => 'Sup Ayam Jahe', 'deskripsi' => 'Sup ayam dengan rasa hangat dari jahe yang cocok untuk cuaca dingin.', 'image_url' => 'https://i.pinimg.com/236x/d0/6b/84/d06b8409850260ebf9aa810969e0eaa5.jpg', 'porsi' => 3, 'waktu' => 30],
            ['user_id' => 6, 'judul' => 'Pancake Coklat', 'deskripsi' => 'Pancake lembut dengan lapisan cokelat yang manis, cocok untuk sarapan atau camilan.', 'image_url' => 'https://i.pinimg.com/236x/dd/56/85/dd56852f99452589daba41d2a641bf45.jpg', 'porsi' => 3, 'waktu' => 25],
            ['user_id' => 4, 'judul' => 'Bakso', 'deskripsi' => 'Bakso daging sapi dengan kuah gurih, disajikan dengan mie dan pelengkap.', 'image_url' => 'https://i.pinimg.com/736x/8d/9e/9f/8d9e9ff302f5925742bb8f6767419bfc.jpg', 'porsi' => 4, 'waktu' => 60],
            ['user_id' => 7, 'judul' => 'Es Krim Coklat', 'deskripsi' => 'Es krim coklat dengan rasa creamy dan manis.', 'image_url' => 'https://i.pinimg.com/236x/cf/54/a4/cf54a4b2647fbe0d9a4e65de34a40c66.jpg', 'porsi' => 6, 'waktu' => 180],
            ['user_id' => 3, 'judul' => 'Pizza Margherita', 'deskripsi' => 'Pizza dengan saus tomat, keju mozzarella, dan daun basil.', 'image_url' => 'https://i.pinimg.com/736x/0b/1e/cb/0b1ecb3f7eaf88bc0f8398e03df97b5c.jpg', 'porsi' => 2, 'waktu' => 40]
        ]);
    }
}

