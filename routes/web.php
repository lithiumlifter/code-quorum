<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/questions', function () {
    return view('frontend.pages.discussion.index');
})->name('forum');

Route::get('/detail-forum', function () {
    return view('frontend.pages.discussion.show');
})->name('detail-forum');

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/create-discuss', function () {
    return view('frontend.pages.discussion.form');
})->name('create-discuss');


Route::get('/edit-answer', function () {
    return view('edit-answer');
})->name('edit-answer');

Route::get('/profile', function () {
    return view('frontend.pages.profile.index');
})->name('profile');
