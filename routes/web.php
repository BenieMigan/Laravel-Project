<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class)->except(['index', 'create', 'show']);
Route::resource('comments', CommentController::class)->except(['create', 'store']);
Route::get('posts/{post}/comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('posts/{post}/comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');


Route::get('/', 'App\Http\Controllers\PostController@index') ;


// Route::get('/', function () {
//     return view('welcome');
// });

