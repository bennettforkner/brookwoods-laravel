<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('make:user', function () {
    $username = readline('Enter username: ');
    $name = readline('Enter name: ');
    $password = readline('Enter password: ');

    User::create([
        'name' => $name,
        'username' => $username,
        'password' => bcrypt($password),
    ]);
    $this->info('User created successfully');
})->purpose('Create a new user');