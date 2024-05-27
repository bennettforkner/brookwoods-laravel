<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionsController extends Controller
{
    public function index()
    {
        $sessions = Session::all();

        return view('sessions.index', compact('sessions'));
    }

    public function show(Session $session)
    {
        return view('sessions.show', compact('session'));
    }

    public function create()
    {
        return view('sessions.create');
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
}
