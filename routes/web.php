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

    // Show searched list in index page
    Route::get('/restaurant/search', [RestaurantController::class, 'search'])->name('restaurant.search');

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




        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profileBase'])->name('profile');

        Route::get('/profile/reservation', [HomeController::class, 'profileReservation'])->name('profile.reservation');

        Route::get('/profile/review', [App\Http\Controllers\HomeController::class, 'profileReview'])->name('profile.review');


        Route::get('/restaurant/show', [RestaurantController::class, 'index'])->name('restaurant.show');

        Route::get('/restaurant/adding', [RestaurantController::class, 'create'])->name('restaurant.adding');

        Route::get('/restaurant/{id}/review', [App\Http\Controllers\RestaurantController::class, 'restaurantReview'])->name('restaurant.review');


        Route::get('/restaurant/adding', [RestaurantController::class, 'create'])->name('restaurant.adding');




        Route::get('/restaurant/edit', [RestaurantController::class, 'edit'])->name('restaurant.edit');


       

        // Restaurant Controller
        // ranking
        Route::get('/restaurant/ranking', [RestaurantController::class, 'restaurantRanking'])->name('restaurant.ranking');

        #Reservation page
        //Tommie working on here:)
        Route::get('/restaurant/{id}/reservasions', [App\Http\Controllers\ReservationController::class, 'show'])->name('restaurant.reservations');
        Route::get('/restaurant/{id}/reservasions/create', [App\Http\Controllers\ReservationController::class, 'create'])->name('restaurant.reservation.create');
        Route::post('/restaurant/reservasions/store', [App\Http\Controllers\ReservationController::class, 'store'])->name('restaurant.reservation.store');
        // detail
        Route::get('/restaurant/{id}/detail', [RestaurantController::class, 'ShowRestaurantDetail'])->name('restaurant.detail');


        // Review Controller
        // show review page
        Route::get('/restaurant/{id}/review', [ReviewController::class, 'ShowRestaurantReview'])->name('restaurant.review');

        //store comment
        Route::post('/restaurant/{id}/review/comment', [ReviewController::class, 'store'])->name('restaurant.review.store');

        Route::post('/restaurant/store', [RestaurantController::class, 'store'])->name('restaurant.store');
        Route::get('/profile/bookmark', [BookmarkController::class, 'show'])->name('profile.bookmark');

        //bookmark restaurants
        Route::post('/bookmark/store', [BookmarkController::class, 'store'])->name('bookmark.store');

        //unbookmark restaurants
        Route::delete('bookmark/{id}/delete', [BookmarkController::class, 'destroy'])->name('bookmark.delete');

        #Profile(Kazuya)
        Route::get('/profile/{id}/show', [ProfileController::class, 'show'])->name('profile.show');
        Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

        // Bookmark Controller
        Route::post('/bookmark/{id}/store',[BookmarkController::class, 'store'])->name('bookmark.store');
        Route::delete('/bookmark/{id}/destroy',[BookmarkController::class, 'destroy'])->name('bookmark.destroy');

    
    });



});
