<?php

namespace App\Http\Controllers;

use App\Models\Person;

class PersonController extends Controller
{
    function show($person_id) {
        $person = Person::where('id', $person_id)
            ->firstOrFail();

        return view('pages.people.show', ['person' => $person]);
    }

    function create() {
        return view('pages.people.create');
    }

    function store() {
        $data = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:M,F',
        ]);

        $person = Person::create($data);

        return redirect()->route('people.show', ['person_id' => $person->id]);
    }
}
