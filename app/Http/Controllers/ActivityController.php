<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    function index() {
        $activitites = Activity::all();
        return view('pages.activities.index', ['activities' => $activitites]);
    }
}
