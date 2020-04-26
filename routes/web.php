<?php


Route::get('/', function () {
    return view('welcome');
});

//
// Authentication routes
//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

// Survey routes
Route::get('/surveys', 'SurveyController@index')->name('surveys.index');
// Only authenticated users may enter...
Route::get('/surveys/{id}/edit','SurveyController@edit')->name('surveys.edit')->middleware('auth','verified');
Route::get('/surveys/{id}/delete','SurveyController@destroy')->name('surveys.destroy')->middleware('auth','verified');
Route::get('/survey/create','SurveyController@create')->name('surveys.create')->middleware('auth','verified');
Route::post('/survey/create','SurveyController@store')->name('surveys.store')->middleware('auth','verified');
Route::post('/survey/update','SurveyController@update')->name('surveys.update')->middleware('auth','verified');
Route::get('/survey/{id}/stop','SurveyController@stop')->name('surveys.stop')->middleware('auth','verified');
Route::get('/survey/{id}/answer','SurveyController@answer')->name('surveys.answer')->middleware('auth','verified');
Route::get('/survey/{id}/result','SurveyController@result')->name('surveys.result')->middleware('auth','verified');

Route::get('/user/profile','UserProfileController@index')->name('user.profile')->middleware('auth','verified');
Route::post('/profile/store','UserProfileController@store')->name('profile.store')->middleware('auth','verified');

