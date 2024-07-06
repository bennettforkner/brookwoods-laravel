<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
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

    public function generateActivityAchievementsListPDF(Request $request) {
        $activity = Activity::find($request->activity_id);
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $achievements = Achievement::whereRaw('date BETWEEN ? AND ?', [$startDate, $endDate])
            ->orderBy('date')
            ->get();

        return view('pdf.activity-achievements-list', [
            'activity' => $activity,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'achievements' => $achievements
        ]);
    }
}
