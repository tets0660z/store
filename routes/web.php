<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductCategoryController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\ProductCategory;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('product', ProductController::class)->only(['index','store','show'])->middleware(['auth', 'verified']);

Route::resource('cart', CartController::class)->only(['store'])->middleware(['auth', 'verified']);

Route::get('product/category/{category}', [ProductCategoryController::class, 'index'])->middleware(['auth', 'verified'])->name('category.index');


require __DIR__ . '/auth.php';
