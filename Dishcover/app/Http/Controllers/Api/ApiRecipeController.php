<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Recipe;
use App\Models\Like;
use App\Models\History;
use App\Models\Ingredient;
use App\Models\Step;
use App\Models\Comment;
use App\Models\User;
use App\Services\RecipeRecommendationService;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApiRecipeController extends Controller
{
    protected $recommendationService;

    public function __construct(RecipeRecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }

    private function appendLikeExists($recipes, $userId)
    {
        $likedRecipeIds = Like::where('user_id', $userId)->pluck('recipe_id')->toArray();

        return $recipes->map(function ($recipe) use ($likedRecipeIds) {
            $recipe->likeExists = in_array($recipe->id, $likedRecipeIds);
            return $recipe;
        });
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

        if ($user) {
            $latestRecipe = $this->appendLikeExists($latestRecipe, $user->id);
            $recipes = $this->appendLikeExists($recipes, $user->id);
            $recommendations = $this->appendLikeExists($recommendations, $user->id);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'recommendations' => $recommendations,
                'latestRecipe' => $latestRecipe,
                'recipes' => $recipes,
            ]
        ]);
    }

    public function searchApi(Request $request)
    {
        $query = $request->input('query');
        $recipes = Recipe::with('user')->where('judul', 'LIKE', "%{$query}%")
            ->get();

        $user = $request->user('sanctum');
        if ($user) {
            $recipes = $this->appendLikeExists($recipes, $user->id);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'recipes' => $recipes,
                'query' => $query
            ]
        ]);
    }

    public function likesApi()
    {
        $userId = Auth::id();
    
        $likeItems = Like::where('user_id', $userId)
            ->orderBy('id', 'desc')
            ->get(['recipe_id', 'id']);
    
        $orderedRecipeIds = $likeItems->pluck('recipe_id')->toArray();
    
        $recipes = Recipe::whereIn('id', $orderedRecipeIds)
            ->with('user')
            ->get()
            ->keyBy('id');
    
        $recipes = collect($orderedRecipeIds)->map(function ($recipeId) use ($recipes, $likeItems) {
            $recipe = $recipes[$recipeId];
            $likeItem = $likeItems->firstWhere('recipe_id', $recipeId);
            $recipe->like_id = $likeItem->id;
            return $recipe;
        });
    
        $recipes = $this->appendLikeExists($recipes, $userId);
    
        return response()->json([
            'success' => true,
            'data' => [
                'recipes' => $recipes
            ]
        ]);
    }

    public function historyApi()
    {
        $userId = Auth::id();

        $historyItems = History::where('user_id', $userId)
            ->orderBy('id', 'desc')
            ->get(['recipe_id', 'id']);

        $orderedRecipeIds = $historyItems->pluck('recipe_id')->toArray();

        $recipes = Recipe::whereIn('id', $orderedRecipeIds)
            ->with('user')
            ->get()
            ->keyBy('id');

        $recipes = collect($orderedRecipeIds)->map(function ($recipeId) use ($recipes, $historyItems) {
            $recipe = $recipes[$recipeId];
            $historyItem = $historyItems->firstWhere('recipe_id', $recipeId);
            $recipe->history_id = $historyItem->id;
            return $recipe;
        });

        $recipes = $this->appendLikeExists($recipes, $userId);

        return response()->json([
            'success' => true,
            'data' => [
                'recipes' => $recipes
            ]
        ]);
    }

    public function myrecipesApi()
    {
        $id = Auth::id();

        $recipes = Recipe::where('user_id', $id)->with('user')->orderBy('id', 'desc')->get();

        $recipes = $this->appendLikeExists($recipes, $id);

        return response()->json([
            'success' => true,
            'data' => [
                'recipes' => $recipes
            ]
        ]);
    }

    public function showApi($id, Request $request) {
        $recipe = Recipe::with('user')->findOrFail($id);

        $ingredient = Ingredient::findOrFail($id);
        $bahan = explode(';', $ingredient->nama_bahan);

        $steps = Step::findOrFail($id);
        $langkah = explode(';', $steps->deskripsi_langkah);

        $comments = \DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.recipe_id', $id)
            ->select('comments.*', 'users.username', 'users.profilepicture_url')
            ->orderBy('comments.id', 'desc')
            ->get();

        $likeExists = false;
        $myrecipe = false;

        // This will return the user if a valid token exists, or null if guest
        $user = $request->user('sanctum');

        if ($user) {
            // Add to history if not already added

            $history = History::where('user_id', $user->id)
                ->where('recipe_id', $id);
            $exists = $history->exists();

            if (!$exists) {
                History::create([
                    'user_id' => $user->id,
                    'recipe_id' => $id,
                ]);
            } else {
                $history->delete();
                History::create([
                    'user_id' => $user->id,
                    'recipe_id' => $id,
                ]);
            }

            $likeExists = Like::where('user_id', $user->id)
                ->where('recipe_id', $id)
                ->exists();

            $myrecipe = $recipe->user_id === $user->id;
        }

        return response()->json([
            'recipe' => $recipe,
            'ingredients' => $bahan,
            'steps' => $langkah,
            'comments' => $comments,
            'likeExists' => $likeExists,
            'myrecipe' => $myrecipe,
        ]);
    }

    public function addLikeApi(Request $request)
    {
        $userId = Auth::id();
        $recipeId = $request->input('recipe_id');

        Like::firstOrCreate([
            'user_id' => $userId,
            'recipe_id' => $recipeId,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Sucessfully liked Recipe ' . $recipeId
        ]);
    }

    public function deleteLikeApi(Request $request)
    {
        $userId = Auth::id();
        $recipeId = $request->input('recipe_id');

        Like::where('user_id', $userId)
            ->where('recipe_id', $recipeId)
            ->delete();

        return response()->json([
            'success' => true,
            'message' => 'Sucessfully unliked Recipe ' . $recipeId
        ]);
    }

    public function uploadApi(Request $request)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 400);
        }

        $incomingFields = $request->validate([
            'judul' => ['required', 'string', 'max:200'],
            'deskripsi' => ['nullable', 'string'],
            'porsi' => ['required', 'integer'],
            'waktu' => ['required', 'integer'], 
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], 
            'langkah' => ['required', 'string'],
            'bahan' => ['required', 'string']
        ]);

        $image = $request->file('image');
        $filename = Str::uuid() . '.jpeg'; // Always convert to jpeg
        $imagePath = 'images/' . $filename;

        $manager = new ImageManager(new Driver());

        $compressed = $manager->read($image)->scaleDown(1280, null)->toJpeg(75);

        // $imagePath = $request->file('image')->store('images', 'public');
        Storage::disk('public')->put($imagePath, $compressed);

        $recipe = Recipe::create([
            'user_id' => $userId, 
            'judul' => $incomingFields['judul'],
            'deskripsi' => $incomingFields['deskripsi'],
            'image_url' => $imagePath, 
            'porsi' => $incomingFields['porsi'],
            'waktu' => $incomingFields['waktu'], 
        ]);

        $steps = Step::create([
            'recipe_id' => $recipe->id,
            'user_id' => $userId,
            'deskripsi_langkah' => $incomingFields['langkah']
        ]);

        $ingredients = Ingredient::create([
            'recipe_id' => $recipe->id,
            'user_id' => $userId,
            'nama_bahan' => $incomingFields['bahan']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Sucessfully created new recipe!'
        ]);
    }

    public function editPageApi($id)
    {
        $userId = Auth::id();
        $recipe = Recipe::with('user')->findOrFail($id);

        if ($userId != $recipe->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden Access to edit Recipe'
            ], 403);
        }

        $ingredient = Ingredient::findOrFail($id);
        $bahan = explode(';', $ingredient->nama_bahan);

        $steps = Step::findOrFail($id);
        $langkah = explode(';', $steps->deskripsi_langkah);

        return response()->json([
            'recipe' => $recipe,
            'ingredients' => $bahan,
            'steps' => $langkah,
        ]);
    }

    public function editApi(Request $request, $id)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 400);
        }

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

        if ($userId != $recipe->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden Access to edit Recipe'
            ], 403);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::uuid() . '.jpeg'; // Always convert to jpeg
            $imagePath = 'images/' . $filename;

            $manager = new ImageManager(new Driver());

            $compressed = $manager->read($image)->scaleDown(1280, null)->toJpeg(75);

            $incomingFields['image'] = $imagePath;

            if ($recipe->image_url) {
                Storage::delete('public/' . $recipe->image_url);
            }

            // $imagePath = $request->file('image')->store('images', 'public');
            Storage::disk('public')->put($imagePath, $compressed);

            $recipe->image_url = $imagePath; 
        }

        $updateData = [
            'judul' => $incomingFields['judul'],
            'deskripsi' => $incomingFields['deskripsi'],
            'porsi' => $incomingFields['porsi'],
            'waktu' => $incomingFields['waktu'],
        ];

        if (isset($incomingFields['image'])) {
            $updateData['image_url'] = $incomingFields['image'];
        }

        $recipe->update($updateData);

        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update([
            'nama_bahan' => $incomingFields['bahan']
        ]);

        $steps = Step::findOrFail($id);
        $steps->update([
            'deskripsi_langkah' => $incomingFields['langkah']
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Sucessfully edited recipe!'
        ]);
    }

    public function addCommentApi(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'isi_komentar' => 'required|string|max:500',  
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        Comment::create([
            'recipe_id' => $id,                          
            'user_id' => Auth::id(),                      
            'isi_komentar' => $request->isi_komentar, 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Sucessfully added new comment!'
        ]);
    }

    public function destroyApi($id)
    {    
        $recipe = Recipe::findOrFail($id);

        $userId = Auth::id();
        if ($userId != $recipe->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden Access to delete Recipe'
            ], 403);
        }

        Ingredient::where('recipe_id', $id)->delete();
        Step::where('recipe_id', $id)->delete();

        $recipe->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Sucessfully deleted recipe!'
        ]);
    }
}
