<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/index', function () {
    return view('index');
});

// Dashboard Routes
// Route::get('/dashboard/default', function () {
//     return view('dashboard.default');
// })->name('dashboard.default');

// Route::get('/dashboard/ecommerce', function () {
//     return view('dashboard.ecommerce');
// })->name('dashboard.ecommerce');

/*
// Unused profile routes - commented out
Route::get('/profile/edit', function () {
    return view('profile.edit');
})->name('profile.edit');

Route::get('/profile/show', function () {
    return view('profile.show');
})->name('profile.show');
*/

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/sign-up', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/sign-up', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
    Route::get('/sign-in', [App\Http\Controllers\Auth\LoginController::class, 'create'])->name('login');
    Route::post('/sign-in', [App\Http\Controllers\Auth\LoginController::class, 'store']);
    Route::get('forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'store'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'destroy'])->name('logout');
    
    // Blog Routes
    Route::get('/blogs', [App\Http\Controllers\BlogController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/get', [App\Http\Controllers\BlogController::class, 'getBlogs'])->name('blogs.get');
    Route::post('/blogs', [App\Http\Controllers\BlogController::class, 'store'])->name('blogs.store');
    Route::put('/blogs/{blog}', [App\Http\Controllers\BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{blog}/delete', [App\Http\Controllers\BlogController::class, 'destroy'])->name('blogs.destroy');
    
    // User Management Routes
    Route::get('/users/get', [UserController::class, 'getUsers'])->name('users.get');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::resource('users', UserController::class)->except(['show', 'create', 'edit']);
});
