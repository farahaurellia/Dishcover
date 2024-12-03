<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
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
}
