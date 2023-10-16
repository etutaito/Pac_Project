<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\Definition;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WordController extends Controller
{



    // Show all  words
    // public function index() {
    //     return view('dictionary', [
    //         'words' => Word::where('languages_id', 1)->latest()->get()
    //     ]);
    // }

    //WORKING SEARCH TERM GET
    public function index() {
        $searchTerm = request('search'); // Get the search term from the request
    
        return view('dictionary', [
            'words' => Word::where('languages_id', 1)
                ->when($searchTerm, function ($query) use ($searchTerm) {
                    $query->where('word', 'like', '%' . $searchTerm . '%');
                })
                ->latest()
                ->get()
        ]);
    }

    //WORKING SHOW DEFINITION
    public function show($word, $definition) {
        // Retrieve the word based on the word text
        $word = Word::where('word', $word)->firstOrFail();
    
        // Retrieve the definition based on the ID
        $definition = Definition::findOrFail($definition);
    
        if (!$definition) {
            // Handle the case when the definition is not found, such as redirecting to an error page or displaying a message.
            // For example, you can redirect to an error page:
            return redirect('/not-found');
        }

            // Fetch the images associated with this definition
            $images = $definition->images;
    
        return view('description', [
            'word' => $word,
            'definition' => $definition,
            'images' => $images, //pass images to view
        ]);
    }
    
    

    //Show single word
    // public function show(Word $word) {
    //     return view('description', [
    //         'word' => $word
    //     ]);
    // }

  //Show definition 
//   public function show(Word $word) {
//     $definition = $word->definitions->first(); // Assuming one definition per word

//     return view('description', [
//         'word' => $word,
//         'definition' => $definition,
//     ]);
// }
// public function show($word, $definition) {
//     $word = Word::where('word', $word)->firstOrFail();

//     // Retrieve the specific definition for the clicked word
//     $selectedDefinition = $word->definitions()->where('id', $definition)->firstOrFail();

//     return view('description', [
//         'word' => $word,
//         'definition' => $selectedDefinition,
//     ]);
// }



  

    // // Show Create Form
    // public function create() {
    //     return view('listings.create');
    // }

    // // Store Listing Data
    // public function store(Request $request) {
    //     $formFields = $request->validate([
    //         'title' => 'required',
    //         'company' => ['required', Rule::unique('listings', 'company')],
    //         'location' => 'required',
    //         'website' => 'required',
    //         'email' => ['required', 'email'],
    //         'tags' => 'required',
    //         'description' => 'required'
    //     ]);

    //     if($request->hasFile('logo')) {
    //         $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    //     }

    //     $formFields['user_id'] = auth()->id();

    //     Listing::create($formFields);

    //     return redirect('/')->with('message', 'Listing created successfully!');
    // }

    // // Show Edit Form
    // public function edit(Listing $listing) {
    //     return view('listings.edit', ['listing' => $listing]);
    // }

    // // Update Listing Data
    // public function update(Request $request, Listing $listing) {
    //     // Make sure logged in user is owner
    //     if($listing->user_id != auth()->id()) {
    //         abort(403, 'Unauthorized Action');
    //     }
        
    //     $formFields = $request->validate([
    //         'title' => 'required',
    //         'company' => ['required'],
    //         'location' => 'required',
    //         'website' => 'required',
    //         'email' => ['required', 'email'],
    //         'tags' => 'required',
    //         'description' => 'required'
    //     ]);

    //     if($request->hasFile('logo')) {
    //         $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    //     }

    //     $listing->update($formFields);

    //     return back()->with('message', 'Listing updated successfully!');
    // }

    // // Delete Listing
    // public function destroy(Listing $listing) {
    //     // Make sure logged in user is owner
    //     if($listing->user_id != auth()->id()) {
    //         abort(403, 'Unauthorized Action');
    //     }
        
    //     if($listing->logo && Storage::disk('public')->exists($listing->logo)) {
    //         Storage::disk('public')->delete($listing->logo);
    //     }
    //     $listing->delete();
    //     return redirect('/')->with('message', 'Listing deleted successfully');
    // }

    // // Manage Listings
    // public function manage() {
    //     return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    // }
}