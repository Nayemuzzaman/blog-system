<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index'])->name('articles.home');

Route::prefix('articles')->name('articles.')->controller(ArticleController::class)->group(function () {
    Route::post('create_confirm', 'createConfirm')->name('create_confirm');
    Route::put('{article}/edit_confirm', 'editConfirm')->name('edit_confirm');
    Route::get('{article}/delete_confirm', 'deleteConfirm')->name('delete_confirm');
});

Route::resource('articles', ArticleController::class);
