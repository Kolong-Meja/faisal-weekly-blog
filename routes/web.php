<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Guest\ArticleController as GuestArticleController;
use App\Http\Controllers\Guest\CategoryController as GuestCategoryController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;

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

// Universal Routes
Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/about', [GuestController::class, 'about'])->name('guestAbout.index');
Route::post('/feedback', [GuestController::class, 'feedback'])->name('feedback.store');

// Article routes
Route::get('/articles', [GuestArticleController::class, 'index'])->name('guestArticle.index');
Route::get('/articles/{slug}', [GuestArticleController::class, 'show'])->name('guestArticle.show');
Route::get('/articles/category/{name}', [GuestArticleController::class, 'category'])->name('guestArticle.category');

// Restricted Routes
Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('dashboard', [MainController::class, 'index'])->name('dashboard');

    Route::middleware('super admin')->group(function () {
        Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
        Route::post('/roles', [RoleController::class, 'store'])->name('role.store');
        Route::put('/roles', [RoleController::class, 'update'])->name('role.update');
        Route::patch('/roles/{id}', [RoleController::class, 'patch'])->name('role.patch');
        Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('role.delete');
    
        Route::get('/users', [UserController::class, 'index'])->name('user.index');
        Route::post('/users', [UserController::class, 'store'])->name('user.store');
        Route::put('/users', [UserController::class, 'update'])->name('user.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.delete');
    });

    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/categories', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
    Route::post('/articles', [ArticleController::class, 'store'])->name('article.store');
    Route::put('/articles', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('article.delete');

    Route::get('/feedbacks', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::delete('/feedbacks', [FeedbackController::class, 'destroy'])->name('feedback.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/settings', [MainController::class, 'setting'])->name('setting');
});

require __DIR__.'/auth.php';
