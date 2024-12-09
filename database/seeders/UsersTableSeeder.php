<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'budisan', 'password' => bcrypt('hash123'), 'email' => 'budi@email.com', 'profilepicture_url' => 'https://i.pinimg.com/736x/de/eb/69/deeb69b5d7f16d97591705063ca9b92a.jpg'],
            ['username' => 'aniw', 'password' => bcrypt('hash124'), 'email' => 'ani@email.com', 'profilepicture_url' => 'https://i.pinimg.com/736x/de/eb/69/deeb69b5d7f16d97591705063ca9b92a.jpg'],
            ['username' => 'citradw', 'password' => bcrypt('hash125'), 'email' => 'citra@email.com', 'profilepicture_url' => 'https://i.pinimg.com/736x/de/eb/69/deeb69b5d7f16d97591705063ca9b92a.jpg'],
            ['username' => 'dedik', 'password' => bcrypt('hash126'), 'email' => 'dedi@email.com', 'profilepicture_url' => 'https://i.pinimg.com/736x/de/eb/69/deeb69b5d7f16d97591705063ca9b92a.jpg'],
            ['username' => 'ekaptr', 'password' => bcrypt('hash127'), 'email' => 'eka@email.com', 'profilepicture_url' => 'https://i.pinimg.com/736x/de/eb/69/deeb69b5d7f16d97591705063ca9b92a.jpg'],
            ['username' => 'fajarr', 'password' => bcrypt('hash128'), 'email' => 'fajar@email.com', 'profilepicture_url' => 'https://i.pinimg.com/736x/de/eb/69/deeb69b5d7f16d97591705063ca9b92a.jpg'],
            ['username' => 'gitasr', 'password' => bcrypt('hash129'), 'email' => 'gita@email.com', 'profilepicture_url' => 'https://i.pinimg.com/736x/de/eb/69/deeb69b5d7f16d97591705063ca9b92a.jpg'],
            ['username' => 'hadip', 'password' => bcrypt('hash130'), 'email' => 'hadi@email.com', 'profilepicture_url' => 'https://i.pinimg.com/736x/de/eb/69/deeb69b5d7f16d97591705063ca9b92a.jpg'],
            ['username' => 'indahp', 'password' => bcrypt('hash131'), 'email' => 'indah@email.com', 'profilepicture_url' => 'https://i.pinimg.com/736x/de/eb/69/deeb69b5d7f16d97591705063ca9b92a.jpg'],
            ['username' => 'jokow', 'password' => bcrypt('hash132'), 'email' => 'joko@email.com', 'profilepicture_url' => 'https://i.pinimg.com/736x/de/eb/69/deeb69b5d7f16d97591705063ca9b92a.jpg'],
        ]);
    }
}
