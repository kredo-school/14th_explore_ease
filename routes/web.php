<?php

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
    return view('welcome');
});
Route::get('restaurant/reservation', function () {
    return view('restaurant/reservations');
});
Route::get('admin/dashboard', function () {
    return view('admin/dashboards');
});
Route::get('admin/dashbord_all_users', function () {
    return view('admin/dashbord_all_users');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');