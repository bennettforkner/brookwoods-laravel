<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Scoresheet;
use Illuminate\Http\Request;

class ScoresheetController extends Controller
{
    public function show($person_id, $scoresheet_id)
    {
        $person = Person::findOrFail($person_id);
        $scoresheet = Scoresheet::findOrFail($scoresheet_id);

        return view('pages.people.pages.scoresheets.show', [
            'person' => $person,
            'scoresheet' => $scoresheet
        ]);
    }
}
