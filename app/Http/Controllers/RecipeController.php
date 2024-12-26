<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Step;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{    
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

    public function showComments($id)
    {
        $recipe = Recipe::findOrFail($id); 
        $comments = $recipe->comments; 
        return view('recipes.comments', compact('recipe', 'comments'));
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

        $ingredient = Ingredient::findorFail($id);
        $bahan = explode(';', $ingredient->nama_bahan);

        $steps = Step::findorFail($id);
        $langkah = explode(';', $steps->deskripsi_langkah);

        if (Auth::check()) {
            History::create([
                'user_id' => Auth::id(),
                'recipe_id' => $id
            ]);
        }
        return view('show', compact('recipe', 'bahan', 'langkah'));
    }

}
