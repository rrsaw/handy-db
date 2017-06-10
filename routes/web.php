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

Route::post('/store-item', 'ButtonsController@storeItem')->name('storeItem');
Route::post('/request-loan', 'LoanController@requestLoan')->name('requestLoan');


Route::get('/registration', function () {
    return view('auth.registration.first');
});
Route::post('/registration', 'RegistrationController@firstStep')->name('firstStep');


Route::get('/confirm', function () {
    return view('auth.registration.second');
});
Route::post('/confirm', 'RegistrationController@secondStep')->name('secondStep');

Route::get('/explore', 'ExploreController@index');

Route::get('/profile', 'ProfileController@index');
Route::get('/profile/info', 'ProfileController@info');

Route::resource('/items', 'ItemsController');

/* Loans section */
Route::get('/confirmation', 'LoanController@indexConfirmation');
Route::get('/confirmation/other', 'LoanController@indexConfirmation');
Route::post('/confirmation/{id}', 'LoanController@activeLoan');
Route::delete('/confirmation/{id}', 'LoanController@deleteLoan');
Route::get('/current', 'LoanController@indexCurrent');
Route::get('/current/other', 'LoanController@indexCurrent');
Route::get('/history', 'LoanController@indexHistory');

Auth::routes();

Route::get('/home', 'HomeController@index');
