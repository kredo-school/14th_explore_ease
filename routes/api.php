<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* 
 * リソースルートのデフォルトセットを超えてリソースコントローラにルートを追加する必要がある場合は、
 * Route::resourceメソッドを呼び出す前にそれらのルートを定義する必要があります。
 * そうしないと、resourceメソッドで定義されたルートが、意図せずに補足ルートよりも優先される可能性があります。 
 */ 
Route::get('restaurants/search', [RestaurantApiController::class, 'search'])->name('restaurants.search');

/*
 * Define index, show, store, update, destroy route at once.
 * Please execute this command to check:
 * php artisan route:list
 */
Route::apiResource('restaurants', RestaurantApiController::class);
