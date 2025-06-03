<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use App\Models\History;
use App\Models\Ingredient;
use App\Models\Step;

class UserRecommendationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_with_recent_history_gets_recommendations()
    {
        $user = User::create([
            'username' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
            'profilepicture_url' => asset('images/profile1.jpg'),
        ]);
        $this->actingAs($user);

        $recipe = Recipe::create([
            'user_id' => $user->id,
            'judul' => 'Spaghetti Carbonara',
            'deskripsi' => 'A delicious pasta recipe.',
            'image_url' => 'spaghetti.jpg',
            'porsi' => 2,
            'waktu' => 25,
        ]);

        History::create([
            'user_id' => $user->id,
            'recipe_id' => $recipe->id,
        ]);

        $recommendedRecipes = [
            Recipe::create(['user_id' => $user->id, 'judul' => 'Pizza', 'deskripsi' => 'Tasty pizza.', 'image_url' => 'pizza.jpg', 'porsi' => 4, 'waktu' => 40]),
            Recipe::create(['user_id' => $user->id, 'judul' => 'Salad', 'deskripsi' => 'Healthy salad.', 'image_url' => 'salad.jpg', 'porsi' => 1, 'waktu' => 10]),
            Recipe::create(['user_id' => $user->id, 'judul' => 'Soup', 'deskripsi' => 'Warm soup.', 'image_url' => 'soup.jpg', 'porsi' => 3, 'waktu' => 30]),
        ];

        $this->mock(RecommendationService::class, function ($mock) use ($recipe, $recommendedRecipes) {
            $mock->shouldReceive('recommendRecipesByTitle')
                ->with($recipe->id)
                ->andReturn($recommendedRecipes);
        });

        $response = $this->get('/');

        $response->assertStatus(200);
        foreach ($recommendedRecipes as $recommendedRecipe) {
            $response->assertSee($recommendedRecipe->judul);
        }
    }


    public function test_user_with_no_history_gets_random_recommendations()
    {
        $user = User::create([
            'username' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
            'profilepicture_url' => asset('images/profile1.jpg'),
        ]);
        $this->actingAs($user);

        $recipes = [
            Recipe::create(['user_id' => $user->id, 'judul' => 'Pancakes', 'deskripsi' => 'Fluffy pancakes.', 'image_url' => 'pancakes.jpg', 'porsi' => 2, 'waktu' => 20]),
            Recipe::create(['user_id' => $user->id, 'judul' => 'Burger', 'deskripsi' => 'Juicy burger.', 'image_url' => 'burger.jpg', 'porsi' => 1, 'waktu' => 15]),
            Recipe::create(['user_id' => $user->id, 'judul' => 'Sushi', 'deskripsi' => 'Fresh sushi.', 'image_url' => 'sushi.jpg', 'porsi' => 4, 'waktu' => 50]),
        ];

        $response = $this->get('/');

        $response->assertStatus(200);
        foreach ($recipes as $recipe) {
            $response->assertSee($recipe->judul);
        }
    }


}
