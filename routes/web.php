<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/restaurant/detail', [App\Http\Controllers\HomeController::class, 'restaurantDetail'])->name('restaurant.detail');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profileBase'])->name('profile');

Route::get('/profile/reservation', [App\Http\Controllers\HomeController::class, 'profileReservation'])->name('profile.reservation');

Route::get('/restaurant/show', [RestaurantController::class, 'index'])->name('restaurant.show');

Route::get('/restaurant/adding', [RestaurantController::class, 'create'])->name('restaurant.adding');

Route::get('/restaurant/{id}/review', [App\Http\Controllers\HomeController::class, 'restaurantReview'])->name('restaurant.review');

Route::get('/restaurant/edit', [RestaurantController::class, 'edit'])->name('restaurant.edit');


Route::get('/profile/bookmark', [ProfileController::class, 'bookmark'])->name('profile.bookmark');

Route::get('/restaurants/ranking', [App\Http\Controllers\HomeController::class, 'restaurantsRanking'])->name('restaurants.ranking');
