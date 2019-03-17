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
    return view('auth.login');
});

Route::get('/allvisitors', 'VisitorController@getVisitors')->name('all_visitors');

Route::resource('visitor', 'VisitorController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('check-attendance', 'VisitorController@checkAttendance')->name('check_attendance');

/*Router for search possibilities*/
Route::get('search', 'VisitorController@search');

/*Route to display search results after autocomplete match*/
Route::post('searchresults', 'VisitorController@searchHits')->name('searchsend');
Route::post('displaybydate', 'VisitorController@displayByDate')->name('displaybydate');
