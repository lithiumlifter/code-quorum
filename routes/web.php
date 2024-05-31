<?php

use App\Models\Discussion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\DiscussionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('discussions', [DiscussionController::class, 'index'])->name('discussions.index');

Route::middleware('auth')->group(function() {
    Route::resource('discussions', DiscussionController::class)->only(['create','show', 'store', 'edit', 'update', 'destroy']);
});

// Rute untuk jawaban
Route::post('discussions/{discussionSlug}/answers', [AnswerController::class, 'store'])->name('answers.store');
Route::delete('answers/{answer}', [AnswerController::class, 'destroy'])->name('answers.destroy');
Route::put('answers/{answer}', [AnswerController::class, 'update'])->name('answers.update');
Route::get('answers/{answer}/edit', [AnswerController::class, 'edit'])->name('answers.edit');


Route::get('/questions', function () {
    return view('frontend.pages.discussion.index');
})->name('forum');

Route::get('/detail-forum', function () {
    return view('frontend.pages.discussion.show');
})->name('detail-forum');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/edit-answer', function () {
    return view('edit-answer');
})->name('edit-answer');

Route::get('/profile', function () {
    return view('frontend.pages.profile.index');
})->name('profile');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
