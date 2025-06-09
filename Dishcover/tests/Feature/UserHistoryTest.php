<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use App\Models\History;
use App\Models\Ingredient;
use App\Models\Step;

class UserHistoryTest extends TestCase
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
            'image_url' => asset('images/profile1.jpg'),
            'porsi' => 4,
            'waktu' => 30, 
        ]);

        $this->ingredient = Ingredient::create([
            'recipe_id' => $this->recipe->id,
            'nama_bahan' => 'Flour',
        ]);

        $this->step = Step::create([
            'recipe_id' => $this->recipe->id,
            'deskripsi_langkah' => 'Mix flour and eggs together.',
        ]);
    }


    public function test_history_shows_prompt_when_user_not_logged_in()
    {
        $response = $this->get('/history');
        $response->assertStatus(200);
        $response->assertViewIs('history'); 
    }

    public function test_user_can_view_their_history()
    {
        History::create([
            'user_id' => $this->user->id,
            'recipe_id' => $this->recipe->id,
        ]);    

        $this->actingAs($this->user);

        $response = $this->get('/history');

        $response->assertStatus(200);
        $response->assertViewHas('recipes');
        $response->assertSee($this->recipe->judul); 
    }

    public function test_recipe_page_visited_appears_in_history()
{
    $this->actingAs($this->user);

    $recipe = Recipe::create([
        'user_id' => $this->user->id,
        'judul' => 'Delicious Recipe',
        'deskripsi' => 'A tasty and easy-to-make dish.',
        'image_url' => 'delicious.jpg',
        'porsi' => 4,
        'waktu' => 30,
    ]);

    History::create([
        'user_id' => $this->user->id,
        'recipe_id' => $recipe->id,
    ]);

    $response = $this->get(route('show', $recipe->id));

    $this->assertDatabaseHas('histories', [
        'user_id' => $this->user->id,
        'recipe_id' => $recipe->id,
    ]);

    $response = $this->get('/history');
    $response->assertStatus(200);

    $response->assertSee($recipe->judul);
}



}
