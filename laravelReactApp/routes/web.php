<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\GuzzleAndSwiperController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         "home" => Route::has('/'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// })->name("homepage");

Route::get('/'  , [UserController::class , 'welcome'] )->name("homepage");

 Route::get("/newproducts", function () {
    return Inertia::render('Newproducts');
 }) ;


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//router routes
Route::get("/users", [UserController::class,'loadUsers'])->name("users.index");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("swiperslide" , [GuzzleAndSwiperController::class, 'swiperDisplays'])->name('swiper');

require __DIR__.'/auth.php';
