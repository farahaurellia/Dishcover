<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Request $request, $recipeId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $recipe = Recipe::findOrFail($recipeId);

        $comment = Comment::create([
            'isi_komentar' => $request->content,
            'user_id' => auth()->id(), 
            'recipe_id' => $recipe->id
        ]);

        return redirect()->route('recipe.show', $recipeId)->with('success', 'Comment added successfully!');
    }

}
