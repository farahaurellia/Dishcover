<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
use App\Services\RecipeRecommendationService;

class ApiRecipeController extends Controller
{
    protected $recommendationService;

    public function __construct(RecipeRecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }

    public function homepageApi(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

    if ($user) {
        $recentHistory = \DB::table('histories')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        $recipe = $recentHistory
            ? Recipe::find((int) $recentHistory->recipe_id)
            : Recipe::inRandomOrder()->first();

        $recommendations = $recipe
            ? $this->recommendationService->recommendRecipesByTitle($recipe->id)->load('user')
            : collect();
    } else {
        // Guest users see random recommendations
        $recommendations = Recipe::with('user')->inRandomOrder()->take(5)->get();
    }

    $latestRecipe = Recipe::with('user')->orderBy('id', 'desc')->take(5)->get();
    $recipes = Recipe::with('user')->take(6)->get();

    return response()->json([
        'success' => true,
        'data' => [
            'recommendations' => $recommendations,
            'latestRecipe' => $latestRecipe,
            'recipes' => $recipes,
        ]
    ]);
    }
}
