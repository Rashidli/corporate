<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\MeetingType;
use Illuminate\Http\Request;

class MeetingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $meeting_types = MeetingType::all();

        return view('settings.meeting_types.index', compact('meeting_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.meeting_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $meeting_type = new MeetingType();

        $request->validate([
            'title' =>'required'
        ]);

        $meeting_type->title = $request->title;

        $meeting_type->save();

        return redirect()->route('meeting_types.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(MeetingType $meeting_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MeetingType $meeting_type)
    {

        return view('settings.meeting_types.edit', compact('meeting_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MeetingType $meeting_type)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $meeting_type->title = $request->title;
        $meeting_type->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeetingType $meeting_type)
    {
        $meeting_type->delete();
        return redirect()->route('meeting_types.index')->with('message','Silindi');
    }
}
