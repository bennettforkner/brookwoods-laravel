<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AwardController;

Route::view('/', 'pages.home')->name('home');

Route::get('activities', [ActivityController::class, 'index'])->name('activites');
Route::get('activities/{activity_slug}', [ActivityController::class, 'show'])->name('activities.show');
Route::get('/activities/{activity_slug}/awards/{award_id}', [AwardController::class, 'show'])->name('activities.awards.show');
