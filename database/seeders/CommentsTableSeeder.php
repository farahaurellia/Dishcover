<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('comments')->insert([
            ['recipe_id' => 1, 'user_id' => 2, 'isi_komentar' => 'Resepnya mudah diikuti dan hasilnya enak!'],
            ['recipe_id' => 1, 'user_id' => 3, 'isi_komentar' => 'Saya tambahkan sedikit cabai, jadi lebih mantap'],
            ['recipe_id' => 2, 'user_id' => 1, 'isi_komentar' => 'Ayam bakarnya juicy dan manis'],
            // Add the rest of the comments entries here...
        ]);
    }
}
