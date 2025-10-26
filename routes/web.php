<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects', function() { return 'Projects page coming soon!'; })->name('projects.index');
Route::get('/projects/{slug}', function() { return 'Project detail coming soon!'; })->name('projects.show');
Route::get('/blog', function() { return 'Blog page coming soon!'; })->name('blog.index');
Route::get('/blog/{slug}', function() { return 'Blog post coming soon!'; })->name('blog.show');
Route::get('/about', function() { return 'About page coming soon!'; })->name('about');
Route::get('/contact', function() { return 'Contact page coming soon!'; })->name('contact');

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