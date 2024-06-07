<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;

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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::put('/mark-notification-as-read/{notificationId}', [NotificationController::class, 'markAsRead'])->name('markNotificationAsRead');

Route::get('discussions', [DiscussionController::class, 'index'])->name('discussions.index');
Route::get('my-discussions', [DiscussionController::class, 'myDiscussions'])->middleware('auth')->name('discussions.myDiscussions');
Route::get('my-saves', [DiscussionController::class, 'mySaves'])->middleware('auth')->name('discussions.mySaves');

Route::get('profile', [UserController::class, 'index'])->middleware('auth')->name('profile.index');
Route::put('/profile/update-password', [UserController::class, 'setting'])->middleware('auth')->name('profile.updatePassword');
Route::get('/profile/setting', [UserController::class, 'settingShow'])->middleware('auth')->name('profile.settingShow');
Route::get('profile/{uid}', [UserController::class, 'show'])->name('profile.show');

Route::get('tags', [DiscussionController::class, 'tag'])->name('discussions.tags');
Route::get('tags/{slug}', [DiscussionController::class, 'showTag'])->name('discussions.showTags');
Route::get('my-answers', [DiscussionController::class, 'myAnswer'])->middleware('auth')->name('discussions.myAnswers');

Route::middleware('auth')->group(function() {
    Route::resource('discussions', DiscussionController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('profile', UserController::class)->only(['index', 'update']);
    Route::post('discussions/{discussion}/like', [LikeController::class, 'discussionLike'])->name('discussion.like.like');
    Route::post('discussions/{discussion}/unlike', [LikeController::class, 'discussionUnLike'])->name('discussion.like.unlike');
    Route::post('answers/{answer}/like', [LikeController::class, 'answerLike'])->name('answer.like.like');
    Route::post('answers/{answer}/unlike', [LikeController::class, 'answerUnLike'])->name('answer.like.unlike');
    Route::post('discussions/{discussionSlug}/answers', [AnswerController::class, 'store'])->name('answers.store');
    Route::delete('answers/{answer}', [AnswerController::class, 'destroy'])->name('answers.destroy');
    Route::put('answers/{answer}', [AnswerController::class, 'update'])->name('answers.update');
    Route::get('answers/{answer}/edit', [AnswerController::class, 'edit'])->name('answers.edit');
});

Route::middleware('auth')->group(function () {
    Route::post('/save/discussion/{discussionId}', [SaveController::class, 'saveDiscussion'])->name('discussion.save');
    Route::delete('/unsave/discussion/{discussionId}', [SaveController::class, 'unsaveDiscussion'])->name('discussion.unsave');
});

Route::get('discussions/{slug}', [DiscussionController::class, 'show'])->name('discussions.show');

Auth::routes();
