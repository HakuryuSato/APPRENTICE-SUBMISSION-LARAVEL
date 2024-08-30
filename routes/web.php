<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;

// ホーム
Route::get('/', [HomeController::class, 'index'])->name('home');

// 記事
route::get('/article/{slug}', [ArticleController::class, 'show'])->name('article.show');
Route::post('/article', [ArticleController::class, 'store'])->middleware('auth')->name('article.store');
Route::put('/article/{slug}', [ArticleController::class, 'update'])->middleware('auth')->name('article.update');
Route::delete('/article/{slug}', [ArticleController::class, 'destroy'])->middleware('auth')->name('article.delete');

// 著者
Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{username}/favorites', [ProfileController::class, 'favorites'])->name('profile.favorites');


// ログイン
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// 登録
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// 記事　作成 編集
Route::get('/editor', [ArticleController::class, 'create'])->middleware('auth')->name('editor.create');
Route::get('/editor/{slug}', [ArticleController::class, 'edit'])->middleware('auth')->name('editor.edit');


// Comments
// Route::post('/article/{slug}/comment', [CommentController::class, 'store'])->middleware('auth')->name('comment.store');
// Route::delete('/article/{slug}/comment/{id}', [CommentController::class, 'destroy'])->middleware('auth')->name('comment.delete');


