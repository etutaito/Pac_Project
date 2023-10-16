<?php

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WordController;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TranslationController;

/*s
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
| Common Resourse Routes: index (all) | Show (Single)
|
*/

/*s
|--------------------------------------------------------------------------
| Middleware Auth
|--------------------------------------------------------------------------
|
| Only when Authentication is passed can users enter the page. The middleware is defined and route is named at Route: show login form
|
*/

//Show Home Page
Route::get('/', function () {
    return view('welcome');
});

//Show Dictionary Page
Route::get('/dictionary', [WordController::class, 'index'])->middleware('auth');

//Show Definition
Route::get('/dictionary/{word}/{definition}', [WordController::class, 'show'])->middleware('auth');



// Route::get('/dictionary', function () {
//     return view('dictionary');
// });


// Route::get("/dictionary", [WordController::class, 'search']);



// Route::get('/dictionary/{word}', [WordController::class, 'show']);



// Show Single Word for Defintion - Place in Controller
// Route::get('/dictionary/{id}', function($id){
//     return view ('description', [
//         'word' => Word::find($id)
//     ]);
// });


//Show Translator Page
Route::get('translation', [TranslationController::class, 'show'])->middleware('auth');

// Route::get('/translation', function () {
//     return view('translation');
// });

//Post Translator Function
Route::post('/translate', [App\Http\Controllers\TranslationController::class, 'translate'])->middleware('auth');


//Show About Page
Route::get('/about', function () {
    return view('about');
});

//Show Contact Page
Route::get('/contact', function () {
    return view('contact');
});

//Show Terms and Conditions
Route::get('/terms', function () {
    return view('terms');
});

//Show Privacy Policy
Route::get('/privacy', function () {
    return view('privacy');
});

//Show Register/Create 
Route::get('/regst', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Log User Out
Route::post('/logout', [UserController::class, 'logout']);



//Show Login Form
Route::get('/logn', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


// Route::get('/?search', function (Request $request){
//     dd($request);
// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
