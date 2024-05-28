<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ScoresheetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SessionsController;
use App\Livewire\PeopleSearch;

Route::view('/', 'pages.home')->name('home');
Route::post('auth/login', [AuthController::class, 'login'])->name('login');
Route::get('auth/login', [AuthController::class, 'loginPage'])->name('loginPage');

Route::middleware('auth')->group(function () {
	Route::get('activities', [ActivityController::class, 'index'])->name('activities');
	Route::get('activities/{activity_slug}', [ActivityController::class, 'show'])->name('activities.show');
	Route::get('activities/{activity_slug}/awards/{award_id}', [AwardController::class, 'show'])->name('activities.awards.show');

	Route::view('people', 'pages.people.index')->name('people');
	Route::get('people/{person_id}', [PersonController::class, 'show'])->name('people.show');
	Route::get('create-person', [PersonController::class, 'create'])->name('people.create');
	Route::post('people', [PersonController::class, 'store'])->name('people.store');

	Route::get('people/{person_id}/scoresheets/{scoresheet_id}', [ScoresheetController::class, 'show'])->name('people.scoresheets.show');

	Route::get('auth/logout', [AuthController::class, 'logout'])->name('logout');

	Route::get('sessions', [SessionsController::class, 'index'])->name('sessions.index');
	Route::get('sessions/{session}', [SessionsController::class, 'show'])->name('sessions.show');

	Route::get('pdfs/activity-signups', [PDFController::class, 'generateActivitySignupsPDF'])->name('pdfs.activity-signups');

	Route::post('sessions/{session}/people-csv', [SessionsController::class, 'storePeopleCSV'])->name('sessions.people-csv.store');

});