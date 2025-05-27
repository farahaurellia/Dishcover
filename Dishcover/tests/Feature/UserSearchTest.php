<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;

class UserSearchTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'username' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => bcrypt('validpassword'),
            'profilepicture_url' => asset('images/profile1.jpg'),
        ]);
    }

    public function test_user_can_search_recipes_by_judul()
    {
        $this->actingAs($this->user);

        $recipe1 = Recipe::create([
            'user_id' => $this->user->id,
            'judul' => 'Spaghetti Bolognese',
            'deskripsi' => 'A classic Italian pasta dish.',
            'image_url' => 'spaghetti.jpg',
            'porsi' => 4,
            'waktu' => 30,
        ]);

        $recipe2 = Recipe::create([
            'user_id' => $this->user->id,
            'judul' => 'Vegetable Stir-fry',
            'deskripsi' => 'A healthy and colorful stir-fry.',
            'image_url' => 'stirfry.jpg',
            'porsi' => 2,
            'waktu' => 20,
        ]);

        $recipe3 = Recipe::create([
            'user_id' => $this->user->id,
            'judul' => 'Chicken Salad',
            'deskripsi' => 'A fresh and tasty chicken salad.',
            'image_url' => 'salad.jpg',
            'porsi' => 3,
            'waktu' => 15,
        ]);

        $response = $this->get('/search?query=spaghetti');

        $response->assertStatus(200);

        $response->assertSee($recipe1->judul);
        $response->assertSee($recipe1->deskripsi);

        $response->assertDontSee($recipe2->judul);
        $response->assertDontSee($recipe3->judul);
    }

}
