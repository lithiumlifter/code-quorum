<?php

use App\Models\Discussion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\LikeController;

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
// Route::get('profile', [UserController::class, 'index'])->name('profile.index');

Route::middleware('auth')->group(function() {
    Route::resource('discussions', DiscussionController::class)->only(['create','show', 'store', 'edit', 'update', 'destroy']);
    Route::resource('profile', UserController::class);
    Route::post('discussions/{discussion}/like', [LikeController::class, 'discussionLike'])->name('discussion.like.like');
    Route::post('discussions/{discussion}/unlike', [LikeController::class, 'discussionUnLike'])->name('discussion.like.unlike');
    Route::post('answers/{answer}/like', [LikeController::class, 'answerLike'])->name('answer.like.like');
    Route::post('answers/{answer}/unlike', [LikeController::class, 'answerUnLike'])->name('answer.like.unlike');
});

// Rute untuk jawaban
Route::post('discussions/{discussionSlug}/answers', [AnswerController::class, 'store'])->name('answers.store');
Route::delete('answers/{answer}', [AnswerController::class, 'destroy'])->name('answers.destroy');
Route::put('answers/{answer}', [AnswerController::class, 'update'])->name('answers.update');
Route::get('answers/{answer}/edit', [AnswerController::class, 'edit'])->name('answers.edit');

Route::middleware('auth')->group(function () {
    Route::post('/save/discussion/{discussionId}', [SaveController::class, 'saveDiscussion'])->name('discussion.save');
    Route::delete('/unsave/discussion/{discussionId}', [SaveController::class, 'unsaveDiscussion'])->name('discussion.unsave');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
