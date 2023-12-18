<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\CategoryController as CategoryHomeController;
use App\Http\Controllers\Guest\PostController as PostHomeController;
use App\Http\Controllers\Guest\TagController as TagHomeController;
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

// Guest route
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::post('/feedback', [HomeController::class, 'feedback'])->name('home.feedback');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('home.portfolio');
Route::get('/posts', [PostHomeController::class, 'index'])->name('posts.index');
Route::get('/posts/{slug}', [PostHomeController::class, 'show'])->name('posts.show');
Route::get('/category/{slug}/posts', [PostHomeController::class, 'category'])->name('posts.category');
Route::get('/tag/{slug}/posts', [PostHomeController::class, 'tag'])->name('posts.tag');
Route::get('/tags', [TagHomeController::class, 'tags'])->name('tags');
Route::get('/categories', [CategoryHomeController::class, 'categories'])->name('categories');

// Admin route
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/create', [AdminController::class, 'usersCreate'])->name('admin.usersCreate');
    Route::post('users', [AdminController::class, 'usersCreateStore'])->name('admin.usersCreateStore');
    Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.delete');
    Route::get('/data/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/data', [AdminController::class, 'store'])->name('admin.store');

    // Profile route
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Post route
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{slug}', [PostController::class, 'detail'])->name('post.detail');
    Route::get('/post/{slug}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{slug}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.delete');

    // Tag route
    Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
    Route::get('/tag/{slug}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::patch('/tag/{slug}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('/tag/{id}', [TagController::class, 'destroy'])->name('tag.delete');

    // Category route
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/{slug}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/category/{slug}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    // Feedback route
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::delete('/feedback/{uuid}', [FeedbackController::class, 'destroy'])->name('feedback.delete');
});

require __DIR__.'/auth.php';
