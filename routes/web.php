<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/post/{post}', [PublicController::class, 'post'])->name('post');

// Route::get('/admin/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/admin/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/admin/posts', [PostController::class, 'store'])->name('posts.store');
// Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/admin/posts/{post}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/admin/posts/deleted', [PostController::class, 'deleted'])->name('posts.deleted');
Route::post('/admin/posts/{post}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('/admin/posts/{post}/permadestroy', [PostController::class, 'permaDestroy'])->name('posts.permadestroy');
Route::resource('/admin/posts', PostController::class);

