<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Person;
use App\Models\Scoresheet;

class ActivityController extends Controller
{
    function index() {
        $activitites = Activity::all()
            ->sortBy('name');

        return view('pages.activities.index', ['activities' => $activitites]);
    }

    function show($activity_id) {
        $activity = Activity::find($activity_id);

        $scoresheets = Scoresheet::where('activity_id', $activity_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.activities.show', ['activity' => $activity, 'scoresheets' => $scoresheets]);
    }
}
