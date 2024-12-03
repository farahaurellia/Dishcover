<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProfilePictureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profile_pictures')->insert([
            ['url' => 'https://i.pinimg.com/736x/de/eb/69/deeb69b5d7f16d97591705063ca9b92a.jpg'],
            ['url' => 'https://i.pinimg.com/236x/70/4d/1c/704d1c3f123cd304beb8fd12561d3ac2.jpg'],
            ['url' => 'https://i.pinimg.com/236x/68/cf/ff/68cfff25d08b07229eee05857a98e261.jpg']
            // Add the rest of the favorites entries here...
        ]);
    }
}
