<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Award;

class AwardController extends Controller
{
    
    function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'points_required' => 'required',
            'short_name' => 'required',
            'status' => 'required',
            'order' => 'required',
        ]);

        $award = new Award();
        $award->name = $request->name;
        $award->description = $request->description;
        $award->image = $request->image;
        $award->points_required = $request->points_required;
        $award->short_name = $request->short_name;
        $award->status = $request->status;
        $award->order = $request->order;
        $award->save();

        return redirect()->route('awards.show', ['id' => $award->id]);
    }

    function show($activity_id, $award_id) {
        $award = Award::find($award_id);

        return view('pages.activities.pages.awards.show', ['award' => $award]);
    }

}
