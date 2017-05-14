<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration', function () {
  return view('auth.registration.first');
});
Route::post('/registration', 'RegistrationController@firstStep')->name('firstStep');
Route::get('/confirm', function () {
  return view('auth.registration.second');
});
Route::post('/confirm', 'RegistrationController@secondStep')->name('secondStep');

Route::get('/explore', function () {
  return view('explore');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
