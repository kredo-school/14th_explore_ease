<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantPhotoController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminGraphController;

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
    Route::get('/restaurant/show', [RestaurantController::class, 'index'])->name('restaurant.show');
    // Show restaurant detail
    Route::get('/restaurant/{id}/detail', [RestaurantController::class, 'ShowRestaurantDetail'])->name('restaurant.detail');

    // Authenticate exclude index page
    Route::group(['middleware'=>'auth'], function () {

        // Dashboard_for_graph
        Route::get('/admin/dashboard', [AdminGraphController::class, 'index'])->name('admin.dashboard');
        Route::get('/api/admin/dashboard', [AdminGraphController::class, 'userChartApi'])->name('admin.userChartApi');
        Route::get('/api/admin/dashboard_restaurant', [AdminGraphController::class, 'restaurantChartApi'])->name('admin.restaurantChartApi');
        Route::get('/api/admin/dashboard_review', [AdminGraphController::class, 'reviewChartApi'])->name('admin.reviewChartApi');
        Route::get('/api/admin/dashboard_reservation', [AdminGraphController::class, 'reservationChartApi'])->name('admin.reservationChartApi');
        Route::get('/api/admin/dashboard_nationality', [AdminGraphController::class, 'nationalityChart'])->name('admin.nationalityChart');

        // Dashboard_all_users
        Route::get('/admin/dashboard_all_users', [App\Http\Controllers\AdminController::class, 'dashboardAllUsers'])->name('admin.allUsers');
        Route::delete('/admin/dashboard_all_users/{id}/deactivate', [App\Http\Controllers\AdminController::class, 'deactivate'])->name('admin_user.deactivate');
        Route::patch('/admin/dashboard_all_users/{id}/activate', [App\Http\Controllers\AdminController::class, 'activate'])->name('admin_user.activate');

        // Dashboard_all_owners
        Route::get('/admin/dashboard_all_owners', [App\Http\Controllers\AdminController::class, 'dashboardAllOwners'])->name('admin.allOwners');
        Route::delete('/admin/dashboard_all_owners/{id}/deactivate', [App\Http\Controllers\AdminController::class, 'deactivateOwner'])->name('admin_owner.deactivate');
        Route::patch('/admin/dashboard_all_owners/{id}/activate', [App\Http\Controllers\AdminController::class, 'activateOwner'])->name('admin_owner.activate');

        // Dashboard_all_restaurants
        Route::get('/admin/dashboard_all_restaurants', [AdminController::class, 'dashboardAllRestaurants'])->name('admin.allRestaurants');
        Route::delete('/admin/dashboard_all_restaurants/{id}/deactivate', [App\Http\Controllers\AdminController::class, 'deactivateRestaurants'])->name('admin_restaurants.deactivate');
        Route::patch('/admin/dashboard_all_restaurants/{id}/activate', [App\Http\Controllers\AdminController::class, 'activateRestaurants'])->name('admin_restaurants.activate');


        // Dashboard_all_reviews
        Route::get('/admin/dashboard_all_reviews', [AdminController::class, 'dashboardAllReviews'])->name('admin.allReviews');
        // Dashboard_all_reservations
        Route::get('/admin/dashboard_all_reservations', [App\Http\Controllers\AdminController::class, 'dashboardAllReservations'])->name('admin.allReservations');
        Route::delete('/admin/dashboard_all_users/{id}/cancel', [App\Http\Controllers\AdminController::class, 'cancelReservation'])->name('admin_reservation.cancel');



        // HomeController
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        // Restaurant Controller
        // Show the form for creating a new resource.
        Route::get('/restaurant/adding', [RestaurantController::class, 'create'])->name('restaurant.adding');
        // Store a newly created resource in storage.
        Route::post('/restaurant/store', [RestaurantController::class, 'store'])->name('restaurant.store');

        // Show the form for editing the specified resource.
        Route::get('/restaurant/{id}/edit', [RestaurantController::class, 'edit'])->name('restaurant.edit');
        // Update the specified resource in storage.
        Route::get('restaurant/{id}/update', [RestaurantController::class, 'update'])->name('restaurant.update');


        // Restaurant Controller
        Route::get('/restaurant/adding', [App\Http\Controllers\RestaurantController::class, 'create'])->name('restaurant.adding');
        Route::get('/restaurant/edit', [App\Http\Controllers\RestaurantController::class, 'edit'])->name('restaurant.edit');
        Route::post('/restaurant/store', [App\Http\Controllers\RestaurantController::class, 'store'])->name('restaurant.store');
        // Remove the specified resource from storage.
        Route::delete('/restaurant/{id}/destroy', [RestaurantController::class, 'destroy'])->name('restaurant.destroy');
        // ranking
        Route::get('/restaurant/ranking', [RestaurantController::class, 'restaurantRanking'])->name('restaurant.ranking');

        // Reservation Controller
        Route::get('/restaurant/{id}/reservasions', [ReservationController::class, 'show'])->name('restaurant.reservations');
        Route::get('/restaurant/{id}/reservasions/create', [ReservationController::class, 'create'])->name('restaurant.reservation.create');
        Route::post('/restaurant/reservasions/store/{restaurant_id}', [ReservationController::class, 'store'])->name('restaurant.reservation.store');

        // Review Controller
        // show review page
        Route::get('/restaurant/{id}/review', [ReviewController::class, 'ShowRestaurantReview'])->name('restaurant.review');
        // store comment
        Route::post('/restaurant/{id}/review/comment', [ReviewController::class, 'store'])->name('restaurant.review.store');

        // Profile Controller
        Route::get('/profile/{id}/show', [ProfileController::class, 'show'])->name('profile.show');
        Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/bookmark/{id}/show', [ProfileController::class, 'bookmarkShow'])->name('bookmark.show');//connect user bookmark page from menu bar
        Route::get('/review/{id}/show', [ProfileController::class, 'reviewShow'])->name('review.show');//connect user review page from menu bar
        Route::get('/reservation/{id}/show', [ProfileController::class, 'reservationShow'])->name('reservation.show');//connect user reservation page from menu bar
        Route::delete('/reservation/{id}/cancel', [ProfileController::class, 'reservationCancel'])->name('reservation.cancel');//can cancel reservation
        Route::get('/reservation/{id}/edit', [ReservationController::class, 'edit'])->name('reservation.edit');//modify the reservation
        Route::delete('review/{id}/delete', [ProfileController::class, 'reviewDelete'])->name('review.delete');//delete the review.

        // Bookmark Controller
        Route::post('/bookmark/{id}/store',[BookmarkController::class, 'store'])->name('bookmark.store');
        Route::delete('/bookmark/{id}/destroy',[BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    });
});
