<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::middleware(['auth'])->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

});

Auth::routes();
