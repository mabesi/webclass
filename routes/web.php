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

Route::get('/slider', function () {
    return view('frontend.slider');
});
Route::get('/404', function () {
    return view('backend.errors.404');
});
Route::get('/500', function () {
    return view('backend.errors.500');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Frontend
Route::get('/terms', 'HomeController@terms')->name('terms');

//Backend
Route::get('/category', 'HomeController@categories');

Route::resource('user', 'UserController');
Route::resource('course', 'CourseController');
