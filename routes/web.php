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

//Testes
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

//Frontend and Backend
Route::get('/', 'HomeController@index')->name('home');

//Frontend
Route::get('/terms', 'HomeController@terms')->name('terms');

Route::get('/youtubeid',function(){
  $url = 'https://www.youtube.com/watch?v=2aOtt-g2i_M';
  return getYoutubeEmbedLink($url);
});

//Backend
Route::middleware(['auth'])->group(function(){

  Route::resource('instructor', 'InstructorController');
  Route::resource('category', 'CategoryController');
  Route::resource('user', 'UserController');
  Route::resource('course', 'CourseController');
  Route::resource('unity', 'UnityController');
  Route::resource('lesson', 'LessonController');
  Route::resource('examination', 'ExaminationController');
  Route::resource('question', 'QuestionController');
  Route::resource('courseware', 'CoursewareController');

  Route::get('/lesson-modal/{id}', 'LessonController@modal');
  Route::get('/course/{id}/unity/create','UnityController@create');
  Route::get('/course/{id}/courseware/create','CoursewareController@create');
  Route::get('/unity/{id}/lesson/create','LessonController@create');
  Route::get('/unity/{id}/examination/create','ExaminationController@create');
  Route::get('/examination/{id}/question/create','QuestionController@create');

});
