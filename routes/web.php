<?php

use App\Http\Controllers\Pages\Blog\ShowController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\ActivityController;

Route::get('/', HomeController::class)->name('home');

Route::get('activities', [ActivityController::class, 'index'])->name('activites');