<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Person;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ValueError;

class SessionsController extends Controller
{
    public function index()
    {
        $sessions = Session::all();

        return view('pages.sessions.index', compact('sessions'));
    }

    public function show(Session $session)
    {
        $activities = Activity::all()->sortByDesc('name');
        return view('pages.sessions.show', [
            'session' => $session,
            'activities' => $activities
        ]);
    }

    public function create()
    {
        return view('pages.sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'start_at' => 'required|date',
            'end_at' => 'required|date',
            'year' => 'required|integer',
        ]);

        Session::create($request->all());

        return redirect()->route('sessions.index');
    }

    public function attachPerson(Request $request, Session $session)
    {
        $request->validate([
            'person_id' => 'required|exists:people,id',
        ]);

        DB::table('people_sessions')->insert([
            'person_id' => $request->person_id,
            'session_id' => $session->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('sessions.show', $session);
    }

    public function attachPeople(Request $request, Session $session)
    {
        $request->validate([
            'people' => 'required|array',
            'people.*' => 'exists:people,id',
        ]);

        $people = collect($request->people);

        $people->each(function ($personId) use ($session) {
            DB::table('people_sessions')->insert([
                'person_id' => $personId,
                'session_id' => $session->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return redirect()->route('sessions.show', $session);
    }

    public function storePeopleCSV(Request $request, Session $session)
    {
        $requiredColumns = ['SerialNumber', 'FirstName', 'LastName'];
        $optionalColumns = ['DateOfBirth'];

        $request->validate([
            'csv' => 'required|file',
        ]);

        $csv = array_map('str_getcsv', file($request->file('csv')));

        $columns = array_shift($csv);

        if (count(array_diff($requiredColumns, $columns)) > 0) {
            return back()->withErrors('CSV is missing required columns: ' . implode(', ', array_diff($requiredColumns, $columns)));
        }

        foreach ($csv as $key => $row) {
            try {
                $csv[$key] = array_combine($columns, $row);
            } catch (ValueError $e){
                dd($row, $columns, $key, $e);
            }
        }

        collect($csv)->each(function ($row) use ($session) {
            $personId = Person::where('external_id', $row['SerialNumber'])->first()->id;

            if (!$personId) {
                $personId = Person::create([
                    'first_name' => $row['FirstName'],
                    'last_name' => $row['LastName'],
                    'date_of_birth' => $row['DateOfBirth'] ?? null,
                    'external_id' => $row['SerialNumber']
                ]);
            }
            $existingPersonSession = DB::table('people_sessions')->where('person_id', $personId)->where('session_id', $session->id)->first();
            if (!$existingPersonSession) {
                DB::table('people_sessions')->insert([
                    'person_id' => $personId,
                    'session_id' => $session->id,
                ]);
            }
        });

        return redirect()->route('sessions.show', $session);
    }
}
