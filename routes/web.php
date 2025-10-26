<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

// Public routes (we'll add these later)
Route::get('/', function () {
    return view('welcome');
});

// Admin routes - protected by auth middleware
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Projects
    Route::resource('projects', ProjectController::class);
    
    // Blog Posts
    Route::resource('blog-posts', BlogPostController::class);
    
    // Categories
    Route::resource('categories', CategoryController::class);
    
    // Tags
    Route::resource('tags', TagController::class);
});

// Breeze profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';