<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ScoresheetController;
use App\Livewire\PeopleSearch;

Route::view('/', 'pages.home')->name('home');

Route::get('activities', [ActivityController::class, 'index'])->name('activities');
Route::get('activities/{activity_slug}', [ActivityController::class, 'show'])->name('activities.show');
Route::get('activities/{activity_slug}/awards/{award_id}', [AwardController::class, 'show'])->name('activities.awards.show');

Route::view('people', 'pages.people.index')->name('people');
Route::get('people/{person_id}', [PersonController::class, 'show'])->name('people.show');
Route::get('create-person', [PersonController::class, 'create'])->name('people.create');
Route::post('people', [PersonController::class, 'store'])->name('people.store');

Route::get('people/{person_id}/scoresheets/{scoresheet_id}', [ScoresheetController::class, 'show'])->name('people.scoresheets.show');