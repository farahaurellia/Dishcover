<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Step;
use App\Models\History;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Services\RecipeRecommendationService;

class RecipeController extends Controller
{    
    protected $recommendationService;

    public function __construct(RecipeRecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }

    public function homepage()
    {
        if (Auth::check()) {
            // Get the currently authenticated user
            $user = auth()->user();

            // Get the most recent recipe from the user's history
            $recentHistory = \DB::table('histories')
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->first(); // Gets the most recent record from the history table

            // Check if the user has any history
            if ($recentHistory) {
                // Retrieve the most recent recipe based on history
                $recipe = Recipe::findOrFail((int)$recentHistory->recipe_id);
            } else {
                // If no history exists, pick a random recipe
                $recipe = Recipe::inRandomOrder()->first(); // Retrieve a random recipe
            }

            // Get recommendations based on the selected recipe (from history or random)
            $recommendations = $this->recommendationService->recommendRecipesByTitle($recipe->id);
        } else {
            $recommendations = Recipe::inRandomOrder()->take(5)->get();

        }

        // Fetch the latest recipe by id (highest id)
        $latestRecipe = Recipe::orderBy('id', 'desc')->take(5)->get();


        $recipes = Recipe::take(6)->get();

        return view('homepage', compact('recommendations', 'recipes', 'latestRecipe'));
    }


    public function upload(Request $request)
    {
        $incomingFields = $request->validate([
            'judul' => ['required', 'string', 'max:200'],
            'deskripsi' => ['nullable', 'string'],
            'porsi' => ['required', 'integer'],
            'waktu' => ['required', 'integer'], 
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], 
            'langkah' => ['required', 'string'],
            'bahan' => ['required', 'string']
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $recipe = Recipe::create([
            'user_id' => auth()->id(), 
            'judul' => $incomingFields['judul'],
            'deskripsi' => $incomingFields['deskripsi'],
            'image_url' => $imagePath, 
            'porsi' => $incomingFields['porsi'],
            'waktu' => $incomingFields['waktu'], 
        ]);

        $steps = Step::create([
            'recipe_id' => $recipe->id,
            'user_id' => auth()->id(),
            'deskripsi_langkah' => $incomingFields['langkah']
        ]);

        $ingredients = Ingredient::create([
            'recipe_id' => $recipe->id,
            'user_id' => auth()->id(),
            'nama_bahan' => $incomingFields['bahan']
        ]);

        return redirect('/')->with('success', 'Resep berhasil ditambahkan!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $recipes = Recipe::where('judul', 'LIKE', "%{$query}%")
            ->get();

        return view('search', compact('recipes', 'query'));
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id); 

        $ingredient = Ingredient::findOrFail($id);
        $bahan = explode(';', $ingredient->nama_bahan);

        $steps = Step::findOrFail($id);
        $langkah = explode(';', $steps->deskripsi_langkah);

        // Fetch comments associated with this recipe
        $comments = \DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.recipe_id', $id)
            ->select('comments.*', 'users.username', 'users.profilepicture_url')
            ->get();

        if (Auth::check()) {
            History::create([
                'user_id' => Auth::id(),
                'recipe_id' => $id
            ]);
        }

        return view('show', compact('recipe', 'bahan', 'langkah', 'comments'));
    }

    public function addComment(Request $request, $id)
    {
        // Validate the comment input
        $validated = $request->validate([
            'isi_komentar' => 'required|string|max:500',  // You can adjust validation as needed
        ]);

        // Create the new comment
        Comment::create([
            'recipe_id' => $id,                          // Pass the recipe ID
            'user_id' => Auth::id(),                      // Pass the authenticated user ID
            'isi_komentar' => $validated['isi_komentar'], // Pass the comment text
        ]);

        // Redirect or respond as needed
        return back()->with('success', 'Comment added successfully!');
    }

    public function addLike($id)
    {
        Like::create([
            'user_id' => Auth::id(),
            'recipe_id' => $id
        ]);

        return back()->with('success', 'Comment added successfully!');
    }


}
