<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTagController;
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
    return view('welcome');
});

Route::get('users/{id}', function ($id) {
    return view('user-profile');
});

Route::get('/search', function () {
   return view('search'); 
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Posts
Route::get('/', [PostController::class, 'index'])->name('posts');
Route::get('/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/create', [PostController::class, 'create'])->name('post.create');
Route::post('/', [PostController::class, 'create'])->name('post.create');
Route::delete('/{post}', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/edit/{post}', [PostController::class, 'update'])->name('post.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
