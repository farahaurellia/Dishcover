<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Step;

class UserDownloadTest extends TestCase
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

    public function test_user_can_download_recipe()
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

        Ingredient::create([
            'recipe_id' => $recipe->id,
            'nama_bahan' => 'Flour;Eggs;Milk',
        ]);

        Step::create([
            'recipe_id' => $recipe->id,
            'deskripsi_langkah' => 'Mix ingredients;Cook pancakes;Serve hot',
        ]);

        $response = $this->get(route('recipes.download', $recipe->id));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
        $response->assertHeader('Content-Disposition', 'attachment; filename="' . $recipe->judul . '.pdf"');
    }


}
