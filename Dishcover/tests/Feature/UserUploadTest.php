<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Recipe;
use App\Models\History;
use App\Models\Ingredient;
use App\Models\Step;

class UserUploadTest extends TestCase
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

    public function test_user_can_upload_a_recipe()
    {
        $this->actingAs($this->user);

        $file = \Illuminate\Http\UploadedFile::fake()->image('recipe.jpg');

        $response = $this->post('/upload', [
            'judul' => 'Chocolate Cake',
            'deskripsi' => 'Rich and moist chocolate cake.',
            'porsi' => 8,
            'waktu' => 60,
            'image' => $file,
            'langkah' => 'Mix ingredients and bake.',
            'bahan' => 'Flour, Cocoa Powder, Sugar, Eggs',
        ]);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('recipes', [
            'user_id' => $this->user->id,
            'judul' => 'Chocolate Cake',
        ]);

        $this->assertDatabaseHas('recipes', [
            'image_url' => 'images/' . basename($file->store('images', 'public')),
        ]);

        $this->assertDatabaseHas('ingredients', [
            'recipe_id' => Recipe::where('judul', 'Chocolate Cake')->first()->id,
            'nama_bahan' => 'Flour, Cocoa Powder, Sugar, Eggs',
        ]);

        $this->assertDatabaseHas('steps', [
            'recipe_id' => Recipe::where('judul', 'Chocolate Cake')->first()->id,
            'deskripsi_langkah' => 'Mix ingredients and bake.',
        ]);
    }


    public function test_user_can_edit_their_recipe()
    {
        $this->actingAs($this->user);

        $recipe = Recipe::create([
            'user_id' => $this->user->id,
            'judul' => 'Simple Salad',
            'deskripsi' => 'A healthy and quick salad.',
            'image_url' => 'salad.jpg',
            'porsi' => 2,
            'waktu' => 10,
        ]);

        Ingredient::create([
            'recipe_id' => $recipe->id,
            'nama_bahan' => 'Lettuce, Tomatoes, Cucumber, Olives',
        ]);

        Step::create([
            'recipe_id' => $recipe->id,
            'deskripsi_langkah' => 'Mix ingredients thoroughly.',
        ]);

        $file = \Illuminate\Http\UploadedFile::fake()->image('updated_salad.jpg');

        $response = $this->post("/edit/{$recipe->id}", [
            'judul' => 'Updated Salad',
            'deskripsi' => 'An updated version of the salad.',
            'porsi' => 3,
            'waktu' => 15,
            'image' => $file,
            'langkah' => 'Mix ingredients thoroughly.',
            'bahan' => 'Lettuce, Tomatoes, Cucumber, Olives',
        ]);

        $this->assertDatabaseHas('recipes', [
            'id' => $recipe->id,
            'judul' => 'Updated Salad',
            'deskripsi' => 'An updated version of the salad.',
            'porsi' => 3,
            'waktu' => 15,
        ]);

        $imagePath = 'images/' . basename($file->store('images', 'public'));
        $this->assertDatabaseHas('recipes', [
            'id' => $recipe->id,
            'image_url' => $imagePath,
        ]);

        $this->assertDatabaseHas('ingredients', [
            'recipe_id' => $recipe->id,
            'nama_bahan' => 'Lettuce, Tomatoes, Cucumber, Olives',  
        ]);

        $this->assertDatabaseHas('steps', [
            'recipe_id' => $recipe->id,
            'deskripsi_langkah' => 'Mix ingredients thoroughly.',
        ]);
    }





    public function test_user_can_delete_their_recipe()
    {
        $this->actingAs($this->user);

        $recipe = Recipe::create([
            'user_id' => $this->user->id,
            'judul' => 'To Be Deleted',
            'deskripsi' => 'This recipe will be deleted.',
            'image_url' => 'delete.jpg',
            'porsi' => 1,
            'waktu' => 5,
        ]);

        $ingredient = Ingredient::create([
            'recipe_id' => $recipe->id,
            'nama_bahan' => 'Tomato, Lettuce',
        ]);

        $step = Step::create([
            'recipe_id' => $recipe->id,
            'deskripsi_langkah' => 'Chop and mix ingredients.',
        ]);

        $response = $this->delete("/edit/{$recipe->id}");

        $this->assertDatabaseMissing('recipes', [
            'id' => $recipe->id,
        ]);

        $this->assertDatabaseMissing('ingredients', [
            'recipe_id' => $recipe->id,
        ]);

        $this->assertDatabaseMissing('steps', [
            'recipe_id' => $recipe->id,
        ]);
    }




    public function test_user_can_view_their_uploaded_recipe()
    {
        $this->actingAs($this->user);

        $recipe = Recipe::create([
            'user_id' => $this->user->id,
            'judul' => 'Spaghetti Bolognese',
            'deskripsi' => 'A classic Italian pasta dish.',
            'image_url' => 'test_image.jpg',
            'porsi' => 4,
            'waktu' => 30,
        ]);

        $response = $this->get('/myrecipe');

        $response->assertStatus(200);

        $response->assertSee($recipe->judul);
        $response->assertSee($recipe->deskripsi);
    }




}
