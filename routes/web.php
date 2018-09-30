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
  Route::resource('trail', 'TrailController');
  Route::resource('rating', 'RatingController');

  Route::get('/mycourses','CourseController@myCourses');
  Route::get('/lesson/{id}/watched', 'LessonController@watched');
  Route::get('/lesson/{id}/modal', 'LessonController@modal');
  Route::get('/course/{id}/unity/create','UnityController@create');
  Route::get('/course/{id}/courseware/create','CoursewareController@create');
  Route::get('/course/{id}/ratings','RatingController@course');
  Route::get('/course/{id}/register','CourseController@register');
  Route::get('/course/{id}/certificate','CourseController@certificate');
  Route::get('/course/{id}/pdf-certificate','CourseController@pdfCertificate');
  Route::get('/rating/{id}/remove','RatingController@remove');
  Route::get('/unity/{id}/lesson/create','LessonController@create');
  Route::get('/unity/{id}/examination/create','ExaminationController@create');
  Route::get('/examination/{id}/question/create','QuestionController@create');
  Route::post('/examination/{id}/attempt','ExaminationController@attempt');
  Route::get('/examination/{id}/verification','ExaminationController@verification');
  Route::get('/examination/{id}/retry','ExaminationController@retry');
  Route::post('/trail/{id}/course/include','TrailController@includeCourse');
  Route::delete('/trail/{trailId}/course/{courseId}/remove','TrailController@removeCourse');
  Route::get('change-password', 'UserController@editPassword');
  Route::post('change-password', 'UserController@changePassword');

});
