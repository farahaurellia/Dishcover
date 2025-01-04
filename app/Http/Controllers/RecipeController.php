<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Step;
use App\Models\History;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Services\RecipeRecommendationService;
use PDF;

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
            $user = auth()->user();

            $recentHistory = \DB::table('histories')
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->first(); 

            if ($recentHistory) {
                $recipe = Recipe::findOrFail((int)$recentHistory->recipe_id);
            } else {
                $recipe = Recipe::inRandomOrder()->first(); // Retrieve a random recipe
            }

            $recommendations = $this->recommendationService->recommendRecipesByTitle($recipe->id);
        } else {
            $recommendations = Recipe::inRandomOrder()->take(5)->get();

        }

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
            $exists = History::where('user_id', Auth::id())
                    ->where('recipe_id', $id)
                    ->exists();

            if (!$exists) {
                History::create([
                    'user_id' => Auth::id(),
                    'recipe_id' => $id,
                ]);
            }
        }

        $likeExists = Like::where('user_id', Auth::id())
                  ->where('recipe_id', $id)
                  ->exists();

        $myrecipe = Recipe::where('user_id', Auth::id())
                    ->where('id', $id)
                    ->exists();

        return view('show', compact('recipe', 'bahan', 'langkah', 'comments', 'likeExists', 'myrecipe'));
    }

    public function addComment(Request $request, $id)
    {
        $validated = $request->validate([
            'isi_komentar' => 'required|string|max:500',  
        ]);

        Comment::create([
            'recipe_id' => $id,                          
            'user_id' => Auth::id(),                      
            'isi_komentar' => $validated['isi_komentar'], 
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

    public function like(Request $request)
    {
        $userId = auth()->id();
        $recipeId = $request->input('recipe_id');

        Like::firstOrCreate([
            'user_id' => $userId,
            'recipe_id' => $recipeId,
        ]);

        return back()->with('success', 'Recipe liked successfully!');
    }

    public function unlike(Request $request)
    {
        $userId = auth()->id();
        $recipeId = $request->input('recipe_id');

        Like::where('user_id', $userId)
            ->where('recipe_id', $recipeId)
            ->delete();

        return back()->with('success', 'Recipe unliked successfully!');
    }

    public function download($id)
    {
        $recipe = Recipe::findOrFail($id);

        $ingredient = Ingredient::findOrFail($id);
        $bahan = explode(';', $ingredient->nama_bahan);

        $steps = Step::findOrFail($id);
        $langkah = explode(';', $steps->deskripsi_langkah);

        $pdf = PDF::loadView('pdf', compact('recipe', 'bahan', 'langkah'));

        return $pdf->download($recipe->judul . '.pdf');
    }

    public function editPage($id)
    {
        $recipe = Recipe::findOrFail($id);

        $ingredient = Ingredient::findOrFail($id);

        $steps = Step::findOrFail($id);

        return view('edit', compact('recipe', 'ingredient', 'steps'));
    }

    public function edit(Request $request, $id)
    {
        $incomingFields = $request->validate([
            'judul' => ['string', 'max:200'],
            'deskripsi' => ['nullable', 'string'],
            'porsi' => ['integer'],
            'waktu' => ['integer'], 
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], 
            'langkah' => ['string'],
            'bahan' => ['string']
        ]);

        $recipe = Recipe::findOrFail($id);
        $recipe->update([
            'judul' => $incomingFields['judul'],
            'deskripsi' => $incomingFields['deskripsi'],
            'porsi' => $incomingFields['porsi'],
            'waktu' => $incomingFields['waktu'],
        ]);

        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update([
            'nama_bahan' => $incomingFields['bahan']
        ]);

        $steps = Step::findOrFail($id);
        $steps->update([
            'deskripsi_langkah' => $incomingFields['langkah']
        ]);

        return redirect()->route('show', $recipe->id)->with('success', 'Recipe updated successfully!');
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect('/')->with('success', 'Recipe deleted successfully!');
    }

}

