<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Like;

class UserLikeTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $recipe;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'username' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => bcrypt('validpassword'),
            'profilepicture_url' => asset('images/profile1.jpg'),
        ]);

        $this->recipe = Recipe::create([
            'user_id' => $this->user->id,
            'judul' => 'Delicious Pancakes',
            'deskripsi' => 'A simple and delicious pancake recipe.',
            'image_url' => asset('images/recipe1.jpg'),
            'porsi' => 4,
            'waktu' => 30,
        ]);
    }

    public function test_user_can_like_a_recipe()
    {
        $this->actingAs($this->user);

        $response = $this->post('/like', [
            'recipe_id' => $this->recipe->id, 
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('like', [
            'user_id' => $this->user->id,
            'recipe_id' => $this->recipe->id,
        ]);
    }

    public function test_user_can_unlike_a_recipe()
    {
        $this->actingAs($this->user);

        Like::create([
            'user_id' => $this->user->id,
            'recipe_id' => $this->recipe->id,
        ]);

        $this->assertDatabaseHas('like', [
            'user_id' => $this->user->id,
            'recipe_id' => $this->recipe->id,
        ]);

        $response = $this->post('/unlike', [
            'recipe_id' => $this->recipe->id,
        ]);

        $response->assertRedirect();

        $this->assertDatabaseMissing('like', [
            'user_id' => $this->user->id,
            'recipe_id' => $this->recipe->id,
        ]);
    }


    public function test_user_can_view_liked_recipes()
    {
        $this->actingAs($this->user);

        Like::create([
            'user_id' => $this->user->id,
            'recipe_id' => $this->recipe->id,
        ]);

        $response = $this->get('/like');

        $response->assertStatus(200);
        $response->assertViewHas('recipes');
        $response->assertSee($this->recipe->judul);
    }

}

