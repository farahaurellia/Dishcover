<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Step;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Comment;
use App\Models\History;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call each model's individual seeder
        $this->call([
            ProfilePictureTableSeeder::class,
            UsersTableSeeder::class,
            RecipesTableSeeder::class,
            IngredientsTableSeeder::class,
            StepsTableSeeder::class,
            CommentsTableSeeder::class,
            LikeTableSeeder::class,
            HistoryTableSeeder::class,
        ]);
    }
}