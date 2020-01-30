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

Route::get('/', 'JobController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');

// company
Route::get('/company/{id}/{company}', 'CompanyController@index')->name('company.index');

// profile
Route::get('/user/profile', 'UserProfileController@index');
Route::post('user/profile/create', 'UserProfileController@store')->name('profile.create');
Route::post('user/coverletter/create', 'UserProfileController@coverletter')->name('cover.letter');
Route::post('user/resume/create', 'UserProfileController@resume')->name('resume');
Route::post('user/avatar', 'UserProfileController@avatar')->name('avatar');

