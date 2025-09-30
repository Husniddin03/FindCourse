<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return response()->view('pages.404', [], 404);
});

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/blog-grid', [PageController::class, 'blogGrid'])->name('blog-grid');
Route::get('/blog-single', [PageController::class, 'blogSingle'])->name('blog-single');
Route::get('/404', [PageController::class, 'notFound'])->name('404');

Route::middleware('guest')->group(function () {
    Route::get('/signin', [PageController::class, 'signin'])->name('signin');
    Route::get('/signup', [PageController::class, 'signup'])->name('signup');

    Route::post('register', [LogController::class, 'register'])->name('register');
    Route::post('login', [LogController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LogController::class, 'logout'])->name('logout');
    Route::resource('course', CourseController::class);
});
