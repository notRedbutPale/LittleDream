<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WatchLaterController;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\PoemController;
use App\Http\Controllers\GameController;



Route::get('/', function () {
    return view('welcome');
})->name('home');

//homepage
Route::get('/', function () {
    return view('homepage');
})->name('homepage');


Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/forget-password', [ForgetPasswordManager::class, 'forgetPassword'])->name('forget.password');
Route::post('/forget-password', [ForgetPasswordManager::class, 'forgetPasswordPost'])->name('forget.password.post');
Route::get('/reset-password/{token}', [ForgetPasswordManager::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password', [ForgetPasswordManager::class, 'resetPasswordPost'])->name('reset.password.post');


Route::get('/logpage', function () {
    return view('logpage');
})->name('logpage');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');


Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.delete');

Route::get('/story', [StoryController::class, 'index'])->name('story');
Route::get('/story/{id}', [StoryController::class, 'show'])->name('story.show');

Route::get('/story/{id}/speech', [StoryController::class, 'generateSpeech'])->name('story.speech');


//Labiab
// Quiz System Routes
Route::get('/categories', [QuizController::class, 'showCategories'])->name('categories');

// Show the first quiz in a category or a specific quiz if quizId is provided
Route::get('/quizzes/{categoryId}/{quizId?}', [QuizController::class, 'showQuiz'])->name('showQuiz');

// Store the score and handle correct/incorrect answers
Route::post('/store-score', [QuizController::class, 'storeScore'])->name('storeScore');

//tasnim:
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::post('/watchlater/add', [WatchLaterController::class, 'add'])->name('watchlater.add');
Route::get('/watchlater', [WatchLaterController::class, 'view'])->name('watchlater.view');
Route::delete('/watchlater/{id}', [WatchLaterController::class, 'remove'])->name('watchlater.remove');
// Route for handling search results
Route::get('/search/results', [SearchController::class, 'results'])->name('search.results');

//Zarin
Route::middleware('auth')->group(function () {
    Route::get('/share-thoughts', [CommentController::class, 'create'])->name('comments.create');
    Route::post('/share-thoughts', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/reaction', [ReactionController::class, 'store'])->name('reactions.store');
    Route::delete('/reaction/{id}', [ReactionController::class, 'destroy'])->name('reactions.destroy');
});

// Route for displaying the animal selection page
Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index');

// Route for displaying facts about a specific animal
Route::get('/animals/{animal}', [AnimalController::class, 'show'])->name('animals.show');

//poem route
Route::get('/poems', [PoemController::class, 'index'])->name('poems.index');
Route::get('/poems/{id}', [PoemController::class, 'show'])->name('poems.show');

//Games
Route::get('/memory-game', [GameController::class, 'memoryGame'])->name('game.memory-game');
Route::get('/tictactoe', [GameController::class, 'ticTacToe'])->name('game.tictactoe');
Route::get('/rock-paper-scissors', [GameController::class, 'rockPaperScissors'])->name('game.rock-paper-scissors');

Route::get('/games', function () {
    return view('games');
})->name('games');
