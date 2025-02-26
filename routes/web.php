<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('post.create');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Lista todas los Posts
Route::get('/post', [PostController::class, 'index'])->name('post.index');

// Muestra formulario para crear una Post
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

// Recibe el formulario y devuelve al usuario a la lista de post
Route::post('/post', [PostController::class, 'store'])->name('post.store');

// Elimina una Post
Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

// Abre formulario de edición de una Post
Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');

// Guarda los cambios sobre una Post
Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');

require __DIR__.'/auth.php';
