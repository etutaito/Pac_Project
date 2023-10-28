<?php

namespace App\Http\Controllers;
use App\Models\Word;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle(Request $request, $wordId)
    {
        // Get the authenticated user
        $user = auth()->user();
    
        // Find the word by ID
        $word = Word::find($wordId);
    
        // Check if the user has already favorited this word
        $favorite = Favorite::where('user_id', $user->id)
            ->where('word_id', $word->id)
            ->first();
    
        // If the user has already favorited the word, remove it from favorites; otherwise, add it.
        if ($favorite) {
            $favorite->delete();
            $message = 'Word removed from favorites.';
        } else {
            $favorite = new Favorite();
            $favorite->user_id = $user->id;
            $favorite->word_id = $word->id;
            $favorite->save();
            $message = 'Word added to favorites.';
        }
    
        return redirect()->back()->with('message', $message);
    }

    public function index()
{
    // Get the authenticated user
    $user = auth()->user();

    // Retrieve the user's favorite words
    $favoriteWords = $user->favorites()->with('word')->get();

    return view('favorites', compact('favoriteWords'));
}
    
}
