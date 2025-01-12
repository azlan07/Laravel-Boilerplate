<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;

// Route::get('/', function () {
//     return view('welcome');
// });

//mengambil data post dari model
Route::get('/', function () {
    $posts = Post::latest()->paginate(10); // Ambil data Post, misalnya 10 data terakhir
    return view('welcome', compact('posts'));
});

//menggunakan show pada controller dan fungsi create pasti eror
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('posts', PostController::class);
Route::resource('posts', PostController::class)->middleware('auth');