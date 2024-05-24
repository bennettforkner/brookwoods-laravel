<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    function index() {
        $activitites = Activity::all()
            ->sortBy('name');

        return view('pages.activities.index', ['activities' => $activitites]);
    }

    function show($id) {
        $activity = Activity::find($id);

        return view('pages.activities.show', ['activity' => $activity]);
    }
}
