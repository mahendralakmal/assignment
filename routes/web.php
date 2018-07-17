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

Route::group(['prefix' => '/students'], function () {
    Route::get('/all', 'StudentsController@listStudents');
    Route::get('/age/{age}', 'StudentsController@ListStudentOnAge');
    Route::get('/{id}', 'StudentsController@ShowCourseAndParents');
    Route::get('/age/{student}/{parent}', 'ParentsController@ListStudentOnAgeAndParentAge');
    Route::post('/','StudentsController@store');
    Route::post('/parent','ParentsController@store');
    Route::get('/edit/{id}', 'StudentsController@retrieve');
    Route::post('/edit', 'StudentsController@update');
    Route::get('/delete/{id}', 'StudentsController@delete');
});

Route::group(['prefix' => '/courses'], function () {
    Route::get('/', 'CourseController@ListCauses');
    Route::post('/', 'CourseController@store');
    Route::get('/edit/{id}', 'CourseController@retrieve');
    Route::post('/edit', 'CourseController@update');
    Route::get('/delete/{id}', 'CourseController@delete');
    Route::get('/{course}/{year}', 'CourseController@ListStudentOnCauseAndYear');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/home', 'HomeController@index')->name('home');

