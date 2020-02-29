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

//
// Authentication routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Survey routes
Route::get('/surveys', 'SurveyController@index')->name('surveys.index');
// Only authenticated users may enter...
Route::get('/surveys/{id}/edit','SurveyController@edit')->name('surveys.edit')->middleware('auth');
Route::get('/surveys/{id}/delete','SurveyController@destroy')->name('surveys.destroy')->middleware('auth');
Route::get('/survey/create','SurveyController@create')->name('surveys.create')->middleware('auth');
Route::post('/survey/create','SurveyController@store')->name('surveys.store')->middleware('auth');
Route::post('/survey/update','SurveyController@update')->name('surveys.update')->middleware('auth');

