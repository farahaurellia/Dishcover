<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RecipeController extends Controller
{    
    public function upload(Request $request){
        $incomingFields = $request->validate([
            'judul' => ['required'],
            'deskripsi' => ['required'],
            'porsi' => ['required'],
            'waktu'=> ['required']
        ]);

        $recipe = Recipe::create([
            $incomingFields,
            'user_id' => auth()->id()
        ]);

        return redirect('/');
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
        return view('show', compact('recipe', 'bahan', 'langkah'));
    }

}
