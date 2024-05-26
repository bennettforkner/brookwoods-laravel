<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Person;
use App\Models\Scoresheet;

class PersonController extends Controller
{
    function show($person_id) {
        $person = Person::where('id', $person_id)
            ->firstOrFail();

        return view('pages.people.show', ['person' => $person]);
    }

    function create() {
        $activities = Activity::all()
            ->sortBy('name');
        return view('pages.people.create', ['activities' => $activities]);
    }

    function store() {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:M,F',
            'scoresheets_comma_separated' => 'sometimes'
        ]);

        $person = Person::create($data);

        if (isset($data['scoresheets_comma_separated'])) {
            $activity_ids = explode(',', $data['scoresheets_comma_separated']);
            foreach ($activity_ids as $activity_id) {
                Scoresheet::create([
                    'person_id' => $person->id,
                    'activity_id' => $activity_id,
                ]);
            }
        }

        return redirect()->route('people.show', ['person_id' => $person->id]);
    }
}
