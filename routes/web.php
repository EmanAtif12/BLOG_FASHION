<?php

use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CallRequestController;

Route::post('/call-request', [CallRequestController::class, 'store'])->name('call-request.store');

Route::resource('posts', PostController::class);

Route::get('/', [HomeController::class, 'homepage'])->name('homepage');

// Blog Post Routes
//Route::resource('posts', PostController::class);

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

// Login route (already likely defined if using Laravel Auth scaffolding).
//Auth::routes();

// Home route
Route::get('/home', [HomeController::class, 'homepage'])->name('home');

// About route
Route::get('/about', [HomeController::class, 'aboutus'])->name('about');
Route::get('home/servicespage', [HomeController::class, 'servicespage'])->name('servicespage');

// Blog route
Route::get('/blogPage', [HomeController::class, 'blogPage'])->name('blogPage');

// Contact route
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
//Route::get('/personal-styling', function () {
  //  return view('personal-styling');
//});

Route::resource('posts', PostController::class);
// In routes/web.php
//Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');


Route::get('/services/personal-styling', [HomeController::class, 'personalStyling'])->name('personalStyling');
Route::get('/services/personal-shopping', [HomeController::class, 'personalShopping'])->name('personalShopping');
//Route::get('/services/custom-tailoring', [HomeController::class, 'customTailoring']);
Route::get('/custom-tailoring', [HomeController::class, 'customtailoring'])->name('custom-tailoring');
Route::get('/fix-category-ids', [HomeController::class, 'fixCategoryIds']);
//Route::get('/categories/categoriesCreate', [CategoryController::class, 'categoriesCreate'])->name('categoriesCreate');

Route::resource('categories', CategoryController::class);
// Routes for categories
Route::get('/categories/categoriesCreate', [CategoryController::class, 'categoriesCreate'])->name('categories.categoriesCreate');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

// Routes for posts
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/search', [PostController::class, 'search'])->name(name: 'search');

//Route::get('/home/search', [PostController::class, 'search'])->name('search');

//Route::get('/servicespage', [PostController::class, 'index'])->name('services');

Route::get('/', [HomeController::class, 'homepage'])->name('homepage');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';