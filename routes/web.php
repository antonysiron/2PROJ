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
Route::get('/surveys/{id}/edit','SurveyController@edit')->name('surveys.edit')->middleware('auth','verified','ownSurvey');
Route::get('/surveys/{id}/delete','SurveyController@destroy')->name('surveys.destroy')->middleware('auth','verified','ownSurvey');
Route::get('/surveys/create','SurveyController@create')->name('surveys.create')->middleware('auth','verified');
Route::post('/surveys/create','SurveyController@store')->name('surveys.store')->middleware('auth','verified');
Route::post('/surveys/update','SurveyController@update')->name('surveys.update')->middleware('auth','verified','ownSurvey');
Route::get('/surveys/{id}/stop','SurveyController@stop')->name('surveys.stop')->middleware('auth','verified','ownSurvey');
Route::get('/surveys/{id}/answer','SurveyController@answer')->name('surveys.answer')->middleware('auth','verified');
Route::get('/surveys/{id}/result','SurveyController@result')->name('surveys.result')->middleware('auth','verified');
// Survey Questions
Route::get('/surveys/{id}/questions','QuestionsController@index')->name('questions.index')->middleware('auth','verified','ownSurvey');
Route::get('/surveys/{id}/questions/create/{question_type}','QuestionsController@create')->name('questions.create')->middleware('auth','verified','ownSurvey');
Route::get('/surveys/{id}/questions/{question_id}','QuestionsController@edit')->name('questions.edit')->middleware('auth','verified','ownSurvey');


Route::get('/user/profile','UserProfileController@index')->name('user.profile')->middleware('auth','verified');
Route::post('/profile/store','UserProfileController@store')->name('profile.store')->middleware('auth','verified');

