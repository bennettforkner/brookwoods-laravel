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

    function show($activity_slug) {
        $activity = Activity::where('slug', $activity_slug)
            ->firstOrFail();

        $scoresheets = Scoresheet::where('activity_id', $activity->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $scoresheets->filter(function ($scoresheet) {
            return $scoresheet->achievements->filter(function ($achievement) {
                return date_parse($achievement->date)['year'] == date('Y');
            })->count() > 0;
        });

        return view('pages.activities.show', ['activity' => $activity, 'scoresheets' => $scoresheets]);
    }
}
