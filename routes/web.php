<?php


Route::get('/home','HomeController@index');
Route::get('/','Backend\SampleController@index')->name('home');
Route::get('/welcome','Backend\SampleController@welcome');
Route::get('/posts','Backend\SampleController@posts');
Route::get('/registers','Backend\SampleController@showRegistrationForm')->name('registers');
Route::post('/registers','Backend\SampleController@processRegistration');





Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/registration','AuthController@showRegistration')->name('registration');
Route::post('/registration','AuthController@processRegistration');


Route::get('/userlogin','AuthController@showLogin')->name('userlogin');
Route::post('/userlogin','AuthController@processLogin');

Route::get('/userProfile','AuthController@showUser')->name('userProfile');
Route::get('/userLogout','AuthController@logout')->name('userLogout');
