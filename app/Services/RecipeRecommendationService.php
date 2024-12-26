<?php

namespace App\Services;

use App\Models\Recipe;
use Phpml\FeatureExtraction\TfIdfTransformer;

class RecipeRecommendationService
{
    public function recommendRecipesByTitle($recipeId)
    {
        // Fetch all recipes
        $recipes = Recipe::all();

        // Extract recipe titles and IDs
        $titles = $recipes->pluck('judul')->toArray();
        $recipeIds = $recipes->pluck('id')->toArray();

        // Preprocess titles into numeric vectors using a vocabulary
        $vocabulary = [];
        $vectorizedData = array_map(function ($title) use (&$vocabulary) {
            $words = explode(' ', strtolower($title));
            return array_map(function ($word) use (&$vocabulary) {
                if (!isset($vocabulary[$word])) {
                    $vocabulary[$word] = count($vocabulary); // Assign unique ID
                }
                return $vocabulary[$word];
            }, $words);
        }, $titles);

        // Apply TF-IDF transformation
        $tfidf = new TfIdfTransformer($vectorizedData);
        $tfidf->transform($vectorizedData);

        // Find the target recipe index
        $targetIndex = array_search($recipeId, $recipeIds);
        if ($targetIndex === false) return []; // Recipe not found

        $targetVector = array_map('floatval', $vectorizedData[$targetIndex]);

        // Compute cosine similarity
        $similarities = [];
        foreach ($vectorizedData as $index => $vector) {
            if ($index !== $targetIndex) {
                $vector = array_map('floatval', $vector);           // Ensure numeric
                $similarities[$recipeIds[$index]] = $this->calculateCosineSimilarity($targetVector, $vector);
            }
        }

        // Sort by similarity (descending)
        arsort($similarities);

        // Get top 3 similar recipes
        $recommendedIds = array_keys(array_slice($similarities, 0, 5, true));
        return Recipe::whereIn('id', $recommendedIds)->get();
    }

    /**
     * Calculate the cosine similarity between two vectors.
     *
     * @param array $vec1
     * @param array $vec2
     * @return float
     */
    private function calculateCosineSimilarity(array $vec1, array $vec2): float
    {
        $dotProduct = 0;
        $magnitudeVec1 = 0;
        $magnitudeVec2 = 0;

        foreach ($vec1 as $key => $value) {
            $dotProduct += $value * ($vec2[$key] ?? 0); // Multiply matching elements
            $magnitudeVec1 += $value ** 2;             // Square the values of vec1
        }

        foreach ($vec2 as $value) {
            $magnitudeVec2 += $value ** 2;             // Square the values of vec2
        }

        $magnitudeVec1 = sqrt($magnitudeVec1);
        $magnitudeVec2 = sqrt($magnitudeVec2);

        return $magnitudeVec1 && $magnitudeVec2
            ? $dotProduct / ($magnitudeVec1 * $magnitudeVec2) // Cosine similarity formula
            : 0.0; // If any magnitude is 0, similarity is 0
    }
}
