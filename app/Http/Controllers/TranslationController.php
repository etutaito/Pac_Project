<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use App\Models\Word;
use App\Models\Language;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    // public function translate(Request $request) {
    //     $sourceLanguageId = 1; // English
    //     $targetLanguageId = 2; // Tongan
    //     $wordToTranslate = $request->input('word');
    
    //     // Find the translation in the translations table
    //     $translation = Translation::where('sourceword_id', function ($query) use ($wordToTranslate, $sourceLanguageId) {
    //         $query->select('id')
    //             ->from('words')
    //             ->where('word', $wordToTranslate)
    //             ->where('languages_id', $sourceLanguageId);
    //     })->where('targetlanguage_id', $targetLanguageId)->first();
    
    //     if ($translation) {
    //         // If a translation is found, retrieve the translated word
    //         $translatedWord = Word::where('id', $translation->translatedword_id)->first();
    //         return response()->json(['translation' => $translatedWord->word]);
    //     } else {
    //         // Handle the case when no translation is found.
    //         return response()->json(['translation' => 'Translation not found']);
    //     }
    // }


    // Show Translation Page
    public function show()
    {
        return view('/translation');
    }


    
    public function translate(Request $request) {
        $sourceLanguageId = 1; // English
        $wordToTranslate = $request->input('word');
        $targetLanguage = $request->input('language'); // This is the selected target language name from the user
    
        // Find the ID of the target language
        $targetLanguageId = Language::where('languagename', $targetLanguage)->value('id');
    
        // Find the translation in the translations table
        $translation = Translation::where('sourceword_id', function ($query) use ($wordToTranslate, $sourceLanguageId) {
            $query->select('id')
                ->from('words')
                ->where('word', $wordToTranslate)
                ->where('languages_id', $sourceLanguageId);
        })->where('targetlanguage_id', $targetLanguageId)->first();
    
        if ($translation) {
            // If a translation is found, retrieve the translated word
            $translatedWord = Word::where('id', $translation->translatedword_id)->first();
            $pronunciation = $translatedWord->pronunciation;
            return response()->json(['translation' => $translatedWord->word, 'pronunciation' =>$pronunciation]);
        } else {
            // Handle the case when no translation is found.
            return response()->json(['translation' => 'Translation not found']);
        }
    }


}
