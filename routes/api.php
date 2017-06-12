<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/v1/loans', v1\LoanController::class);
Route::resource('/v1/addresses', v1\AddressController::class);
Route::resource('/v1/categories', v1\CategoryController::class);
Route::resource('/v1/images', v1\ImageController::class);
Route::resource('/v1/items', v1\ItemController::class);
Route::resource('/v1/profileimages', v1\ProfileImageController::class);
Route::resource('/v1/users', v1\UserController::class);
Route::resource('/v1/reviews', v1\ReviewController::class);
Route::resource('/v1/passwordresets', v1\PasswordResetController::class);

Route::post('/v1/login', 'v1\UserController@login');
