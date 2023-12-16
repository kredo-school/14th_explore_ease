<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantPhotoController;
use App\Http\Controllers\Reservation;
use App\Http\Controllers\ReviewController;
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
Auth::routes();

// Set Locale Middleware
Route::group(['middleware'=>'set.locale'], function () {

    // Locale Change Route
    Route::get('/setlocale/{locale}', function($locale) {
        session()->put('locale', $locale);
        return redirect()->back();
    })->name('locale');

    // Show index page with 'existprofile' check middleware
    Route::get('/', function () {
        return view('index');
    })->middleware('existprofile');

    // Show restaurant list
    Route::get('/restaurant/show', [App\Http\Controllers\RestaurantController::class, 'index'])->name('restaurant.show');
    // Show restaurant detail
    Route::get('/restaurant/{id}/detail', [App\Http\Controllers\RestaurantController::class, 'ShowRestaurantDetail'])->name('restaurant.detail');

    // Authenticate exclude index page
    Route::group(['middleware'=>'auth'], function () {

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

        // HomeController
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profileBase'])->name('profile');
        Route::get('/profile/reservation', [App\Http\Controllers\HomeController::class, 'profileReservation'])->name('profile.reservation');
        Route::get('/profile/review', [App\Http\Controllers\HomeController::class, 'profileReview'])->name('profile.review');


        Route::get('/restaurant/show', [RestaurantController::class, 'index'])->name('restaurant.show');

        Route::get('/restaurant/adding', [RestaurantController::class, 'create'])->name('restaurant.adding');

        Route::get('/restaurant/{id}/review', [App\Http\Controllers\RestaurantController::class, 'restaurantReview'])->name('restaurant.review');


        Route::get('/restaurant/{id}/edit', [RestaurantController::class, 'edit'])->name('restaurant.edit');

        Route::get('restaurant/{id}/update', [RestaurantController::class, 'update'])->name('restaurant.update');
       

        // Restaurant Controller
        Route::get('/restaurant/adding', [App\Http\Controllers\RestaurantController::class, 'create'])->name('restaurant.adding');
        Route::get('/restaurant/edit', [App\Http\Controllers\RestaurantController::class, 'edit'])->name('restaurant.edit');
        Route::post('/restaurant/store', [App\Http\Controllers\RestaurantController::class, 'store'])->name('restaurant.store');
        // ranking
        Route::get('/restaurant/ranking', [App\Http\Controllers\RestaurantController::class, 'restaurantRanking'])->name('restaurant.ranking');

        // Reservation Controller
        Route::get('/restaurant/{id}/reservasions', [App\Http\Controllers\ReservationController::class, 'show'])->name('restaurant.reservations');
        Route::get('/restaurant/{id}/reservasions/create', [App\Http\Controllers\ReservationController::class, 'create'])->name('restaurant.reservation.create');
        Route::post('/restaurant/reservasions/store/{restaurant_id}', [App\Http\Controllers\ReservationController::class, 'store'])->name('restaurant.reservation.store');
        // detail
        Route::get('/restaurant/{id}/detail', [RestaurantController::class, 'ShowRestaurantDetail'])->name('restaurant.detail');


        // Review Controller
        // show review page
        Route::get('/restaurant/{id}/review', [App\Http\Controllers\ReviewController::class, 'ShowRestaurantReview'])->name('restaurant.review');
        // store comment
        Route::post('/restaurant/{id}/review/comment', [App\Http\Controllers\ReviewController::class, 'store'])->name('restaurant.review.store');

        // Profile Controller
        //Kazuya working on here:)
        Route::get('/profile/{id}/show', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
        Route::patch('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::get('/bookmark/{id}/show', [App\Http\Controllers\ProfileController::class, 'bookmarkShow'])->name('bookmark.show');//connect bookmark page from menu bar

        // Bookmark Controller
        Route::get('/profile/bookmark', [App\Http\Controllers\BookmarkController::class, 'show'])->name('profile.bookmark');
        Route::post('/bookmark/{id}/store',[App\Http\Controllers\BookmarkController::class, 'store'])->name('bookmark.store');
        Route::delete('/bookmark/{id}/destroy',[App\Http\Controllers\BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    });
});
