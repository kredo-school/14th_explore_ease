<?php

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


Route::get('/restaurants/show', [App\Http\Controllers\HomeController::class, 'restaurants'])->name('restaurant.show');

Route::get('/restaurants/detail', [App\Http\Controllers\HomeController::class, 'restaurantsDetail'])->name('restaurants.detail');

Route::get('/profile', function () {
    return view('users/profile');
});