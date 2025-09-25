<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Calendar Routes
        Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
        Route::post('/add-event', [CalendarController::class, 'store']);
        Route::post('/update-event/{id}', [CalendarController::class, 'update']);
        Route::post('/resize-event/{id}', [CalendarController::class, 'resize']);
        Route::post('/move-event/{id}', [CalendarController::class, 'move']);
        Route::delete('/delete-event/{id}', [CalendarController::class, 'destroy']);

    // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // MasterController
        Route::get('/events', [MasterController::class, 'events'])->name('events');
        Route::get('/recallblockoff', [MasterController::class, 'recallblockoff'])->name('recallblockoff');
        Route::get('/blockoffs', [MasterController::class, 'blockoffs'])->name('blockoffs');
        Route::get('/tasks', [MasterController::class, 'tasks'])->name('tasks');

    // Calendar Search
        Route::get('/calendar/search/{keyword}', [CalendarController::class, 'searchKeyword']);
        Route::get('/branch/{branch}', [CalendarController::class, 'searchBranch'])->name('search_calendar');
        Route::get('/public-calendar', [CalendarController::class, 'publicCalendar'])->name('public_calendar');
});