<?php

namespace App\Http\Controllers;

use App\User1;
use App\Booking;
use App\Guide;

class UserBasedCollaborativeFilteringController extends Controller
{
    public function recommendGuides($userId)
    {
        // Get the target user
        $targetUser = User1::find($userId);

        // Calculate user similarities
        $similarities = $this->calculateUserSimilarities($targetUser);

        // Get a neighborhood of similar users (e.g., top 5)
        $neighborhood = $this->getSimilarUsers($targetUser, $similarities, 5);

        // Recommend guides based on the neighborhood
        $recommendations = $this->getGuideRecommendations($targetUser, $neighborhood);

        return view('guide_recommendations', compact('recommendations'));
    }

    private function calculateUserSimilarities($targetUser)
    {
        $similarities = [];

        // Iterate through all users
        $allUsers = User1::where('id', '!=', $targetUser->id)->get();
        foreach ($allUsers as $user) {
            // Calculate similarity (implement your similarity calculation logic)
            $similarity = $this->calculateSimilarity($targetUser, $user);

            $similarities[$user->id] = $similarity;
        }

        return $similarities;
    }

    private function calculateSimilarity($user1, $user2)
    {
        // Implement your similarity calculation logic (e.g., cosine similarity)
        // Return a value representing the similarity between the two users
    }

    private function getSimilarUsers($targetUser, $similarities, $neighborhoodSize)
    {
        // Sort users by similarity and select the top N users
        arsort($similarities);
        $neighborhood = array_slice($similarities, 0, $neighborhoodSize, true);

        return $neighborhood;
    }

    private function getGuideRecommendations($targetUser, $neighborhood)
    {
        $recommendations = [];

        // Iterate through similar users in the neighborhood
        foreach ($neighborhood as $similarUserId => $similarity) {
            // Get guides liked by similar user but not by the target user
            $recommendedGuides = Booking::where('user_id', $similarUserId)
                ->whereNotIn('guide_id', $targetUser->bookings()->pluck('guide_id'))
                ->pluck('guide_id')
                ->toArray();

            // Aggregate recommendations
            $recommendations = array_merge($recommendations, $recommendedGuides);
        }

        // Count guide occurrences and sort by count
        $guideCounts = array_count_values($recommendations);
        arsort($guideCounts);

        // Return recommended guides
        return $guideCounts;
    }
}
