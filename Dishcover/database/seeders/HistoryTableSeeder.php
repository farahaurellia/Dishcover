<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HistoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('histories')->insert([
            ['user_id' => 1, 'recipe_id' => 2],
            ['user_id' => 1, 'recipe_id' => 3],
            ['user_id' => 2, 'recipe_id' => 1],
            // Add the rest of the history entries here...
        ]);
    }
}
