<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/blog-grid', [PageController::class, 'blogGrid'])->name('blog-grid');
Route::get('/blog-single', [PageController::class, 'blogSingle'])->name('blog-single');
Route::get('/signin', [PageController::class, 'signin'])->name('signin');
Route::get('/signup', [PageController::class, 'signup'])->name('signup');
Route::get('/404', [PageController::class, 'notFound'])->name('404');
