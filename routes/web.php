<?php

use App\Http\Controllers\ParcelTrackController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

//Route::get('/track', [ParcelTrackController::class, 'index']);
//Route::post('/track', [ParcelTrackController::class, 'search']);
Route::get('/track', [TrackController::class, 'index'])->name('track.index');
Route::post('/track', [TrackController::class, 'search'])->name('track.search');

Route::get('/', function () {
    return view('welcome');
});


