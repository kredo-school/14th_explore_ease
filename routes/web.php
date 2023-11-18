<?php
use App\Http\Controllers\HomeController;

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
Route::get('restaurant/reservation', function () {
    return view('restaurant/reservations');
});
Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
});
Route::get('/admin/dashboard_all_users', function () {
    return view('/admin/dashboard_all_users');
});
Route::get('admin/all_restaurants', function () {
    return view('admin/all_restaurants');
});
Route::get('admin/all_reviews', function () {
    return view('admin/all_reviews');
});

Route::get('/admin/dashboard', function () {
    return view('/admin/dashboard');
});


Route::get('admin/dashboard_all_owners', function () {
    return view('admin/dashboard_all_owners');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profileBase'])->name('profile');

Route::get('/profile/reservation', [App\Http\Controllers\HomeController::class, 'profileReservation'])->name('profile.reservation');

Route::get('/profile/review', [App\Http\Controllers\HomeController::class, 'profileReview'])->name('profile.review');

Route::get('/restaurant/show', [RestaurantController::class, 'index'])->name('restaurant.show');

Route::get('/restaurant/adding', [RestaurantController::class, 'create'])->name('restaurant.adding');




//Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/restaurant/edit', [RestaurantController::class, 'edit'])->name('restaurant.edit');

Route::get('/profile/bookmark', [ProfileController::class, 'bookmark'])->name('profile.bookmark');

// Restaurant Controller
Route::get('/restaurant/ranking', [App\Http\Controllers\RestaurantController::class, 'restaurantRanking'])->name('restaurant.ranking');

Route::get('/restaurant/{id}/detail', [App\Http\Controllers\RestaurantController::class, 'ShowRestaurantDetail'])->name('restaurant.detail');

// Review Controller
Route::get('/restaurant/{id}/review', [App\Http\Controllers\ReviewController::class, 'ShowRestaurantReview'])->name('restaurant.review');
