<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;

class UserCommentTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'username' => 'testuser1',
            'email' => 'testuser@example.com',
            'password' => bcrypt('validpassword'),
            'profilepicture_url' => asset('images/profile1.jpg'),
        ]);
    }

    public function test_user_can_leave_comment_on_recipe()
    {
        $this->actingAs($this->user);

        $recipe = Recipe::create([
            'user_id' => $this->user->id,
            'judul' => 'Spaghetti Bolognese',
            'deskripsi' => 'A classic Italian pasta dish.',
            'image_url' => 'spaghetti.jpg',
            'porsi' => 4,
            'waktu' => 30,
        ]);

        $commentData = [
            'isi_komentar' => 'Delicious recipe! I love it.',
        ];

        $response = $this->post("/recipe/{$recipe->id}/comment", $commentData);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Comment added successfully!');

        $this->assertDatabaseHas('comments', [
            'recipe_id' => $recipe->id,
            'user_id' => $this->user->id,
            'isi_komentar' => $commentData['isi_komentar'],
        ]);
    }

}
