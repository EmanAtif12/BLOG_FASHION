<?php

use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'homepage'])->name('homepage');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/


// Home route
Route::get('/home', [HomeController::class, 'homepage'])->name('home');

// About route
Route::get('/about', [HomeController::class, 'aboutus'])->name('about');

// Services route
Route::get('/servicespage', [HomeController::class, 'servicespage'])->name('services');

// Blog route
Route::get('/blog', [HomeController::class, 'blogpage'])->name('blog');

// Contact route
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
//Route::get('/personal-styling', function () {
  //  return view('personal-styling');
//});

Route::get('/services/personal-styling', [HomeController::class, 'personalStyling'])->name('personalStyling');
Route::get('/services/personal-shopping', [HomeController::class, 'personalShopping'])->name('personalShopping');
//Route::get('/services/custom-tailoring', [HomeController::class, 'customTailoring']);
Route::get('/custom-tailoring', [HomeController::class, 'customtailoring'])->name('custom-tailoring');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
