<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestQueryController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::view('/admin', 'admin')->middleware('admin');
    Route::resource('posts', \App\Http\Controllers\PostController::class)->only(['store', 'create', 'edit', 'update', 'destroy']);
});

Route::get('/mamma/{post_id}', [\App\Http\Controllers\PostController::class, 'showId'])->name('posts.show_id');
Route::get("/posts", [\App\Http\Controllers\PostController::class, 'index'])->name("posts.index");
Route::get("/posts/{post}", [\App\Http\Controllers\PostController::class, 'show'])->name("posts.show");

Route::get("/test-query", App\Http\Controllers\TestQueryController::class);

Route::get("/posts/{post}", [\App\Http\Controllers\PostController::class, 'show'])->name("posts.show");
Route::get("test-email", function () {
    $email = new \App\Mail\SalutaTutti("Matteo");

    Mail::send($email);
});

require __DIR__ . '/auth.php';
