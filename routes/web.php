<?php


Route::get('/', function () {
    return view('home');
});

//
// Authentication routes
//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/examples', 'HomeController@examples')->name('examples');
Route::get('/prices', 'HomeController@prices')->name('prices');

// Survey routes
Route::get('/surveys', 'SurveyController@index')->name('surveys.index')->middleware('auth', 'verified', 'surveyExpiry');
// Only authenticated users may enter...
Route::get('/surveys/{id}/edit','SurveyController@edit')->name('surveys.edit')->middleware('auth','verified','ownSurvey');
Route::get('/surveys/{id}/delete','SurveyController@destroy')->name('surveys.destroy')->middleware('auth','verified','ownSurvey');
Route::get('/surveys/create','SurveyController@create')->name('surveys.create')->middleware('auth','verified');
Route::post('/surveys/create','SurveyController@store')->name('surveys.store')->middleware('auth','verified');
Route::post('/surveys/update','SurveyController@update')->name('surveys.update')->middleware('auth','verified','ownSurvey');
Route::get('/surveys/{id}/stop','SurveyController@stop')->name('surveys.stop')->middleware('auth','verified','ownSurvey');
Route::get('/surveys/{id}/results/{question_nb}','SurveyController@result')->name('surveys.result')->middleware('auth','verified', 'ownSurvey');
Route::get('/surveys/{id}', 'SurveyController@show')->name('surveys.view')->middleware('auth', 'verified', 'publishedSurvey');
Route::get('/surveys/{id}/reset', 'SurveyController@reset')->name('surveys.reset')->middleware('auth', 'verified', 'ownSurvey');
// Survey Questions
Route::get('/surveys/{id}/questions','QuestionController@index')->name('questions.index')->middleware('auth','verified','ownSurvey');
Route::get('/surveys/{id}/questions/{question_id}/edit','QuestionController@edit')->name('questions.edit')->middleware('auth','verified','ownSurvey', 'savedSurvey');
Route::get('/surveys/{id}/questions/{question_id}/delete','QuestionController@destroy')->name('questions.destroy')->middleware('auth','verified','ownSurvey');
Route::get('/surveys/{id}/questions/create','QuestionController@create')->name('questions.create')->middleware('auth','verified','ownSurvey');
Route::post('/surveys/{id}/questions/create','QuestionController@store')->name('questions.store')->middleware('auth','verified','ownSurvey');
Route::post('/surveys/{id}/questions/{question_id}/update', 'QuestionController@update')->name('questions.update')->middleware('auth', 'verified', 'ownSurvey', 'savedSurvey');
// Survey Answer
Route::get('/surveys/{id}/answer', 'AnswerController@index')->name('answer.index')->middleware('auth', 'verified', 'publishedSurvey', 'answeredSurvey');
Route::post('/surveys/{id}/answer', 'AnswerController@store')->name('answer.store')->middleware('auth', 'verified', 'publishedSurvey', 'answeredSurvey');

Route::get('/user/profile','UserProfileController@index')->name('user.profile')->middleware('auth','verified');
Route::post('/profile/store','UserProfileController@store')->name('profile.store')->middleware('auth','verified');
