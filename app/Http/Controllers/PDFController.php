<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Session;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generateActivitySignupsPDF(Request $request)
    {
        $session = Session::find($request->session_id);
        $activity = Activity::find($request->activity_id);
        $scoresheets = $session->people->map(function ($person) use ($activity) {
            return $person->scoresheets->where('activity_id', $activity->id)->first();
        })->whereNotNull();

        return view('pdf.activity-signups', [
            'session' => $session,
            'scoresheets' => $scoresheets,
            'activity' => $activity
        ]);
    }
}
