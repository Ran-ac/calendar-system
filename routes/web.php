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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/calendar', 'CalendarController@index')->name('calendar')->middleware('auth');
Route::post('/add-event', 'CalendarController@store')->middleware('auth');
Route::post('/update-event/{id}', 'CalendarController@update')->middleware('auth');
Route::post('/resize-event/{id}', 'CalendarController@resize')->middleware('auth');
Route::post('/move-event/{id}', 'CalendarController@move')->middleware('auth');
Route::delete('/delete-event/{id}', 'CalendarController@destroy')->middleware('auth');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');

Route::get('/events', 'MasterController@events')->name('events')->middleware('auth');
Route::get('/recallblockoff', 'MasterController@recallblockoff')->name('recallblockoff')->middleware('auth');
Route::get('/blockoffs', 'MasterController@blockoffs')->name('blockoffs')->middleware('auth');
Route::get('/tasks', 'MasterController@tasks')->name('tasks')->middleware('auth');

Route::get('/calendar/search/{keyword}','CalendarController@searchKeyword')->middleware('auth');

Route::get('/branch/{branch}','CalendarController@searchBranch')->name('search_calendar')->middleware('auth');
Route::get('/public-calendar','CalendarController@publicCalendar')->name('public_calendar')->middleware('auth');