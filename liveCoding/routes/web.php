<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;


Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');



