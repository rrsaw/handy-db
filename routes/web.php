<?php

Route::group(['middleware' => 'auth'], function () {
    // General section
    Route::post('/store-item', 'ButtonsController@storeItem')->name('storeItem');
    Route::get('/logout', 'ButtonsController@logout')->name('logout');
    Route::get('/home', 'HomeController@index');


  /* Explore section */
  Route::get('/explore', 'ExploreController@index');


  /* Items section */
  Route::resource('/items', 'ItemsController');


  /* Loans section */
  Route::post('/request-loan', 'LoanController@requestLoan')->name('requestLoan');
    Route::get('/confirmation', 'LoanController@indexConfirmation');
    Route::get('/confirmation/other', 'LoanController@indexConfirmation');
    Route::post('/confirmation/{id}', 'LoanController@activeLoan');
    Route::delete('/confirmation/{id}', 'LoanController@deleteLoan');
    Route::get('/current', 'LoanController@indexCurrent');
    Route::get('/current/other', 'LoanController@indexCurrent');
    Route::get('/history', 'LoanController@indexHistory');
    Route::get('/history/other', 'LoanController@indexHistory');
    Route::post('/create-review', 'ReviewController@create');


  /* Profile section */
  Route::get('/profile', 'ProfileController@index');
    Route::get('/profile/info', 'ProfileController@index');
    Route::get('/profile/reviews', 'ProfileController@index');
    Route::get('/profile/{id}', 'ProfileController@show');
    Route::get('/profile/{id}/reviews', 'ProfileController@show');
    Route::get('/profile/{id}/info', 'ProfileController@show');
});

/* Auth section */
Auth::routes();
Route::get('/registration', function () {
    return view('auth.registration.first');
});
Route::get('/confirm', function () {
    return view('auth.registration.second');
});
Route::post('/registration', 'RegistrationController@firstStep')->name('firstStep');
Route::post('/confirm', 'RegistrationController@secondStep')->name('secondStep');

Route::get('/', function () {
    return view('welcome');
});
