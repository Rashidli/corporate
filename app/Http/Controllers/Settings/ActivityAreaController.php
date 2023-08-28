<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\ActivityArea;
use Illuminate\Http\Request;

class ActivityAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $activity_areas = ActivityArea::all();

        return view('settings.activity_areas.index', compact('activity_areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.activity_areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $activity_area = new ActivityArea();

        $request->validate([
            'title' =>'required'
        ]);

        $activity_area->title = $request->title;

        $activity_area->save();

        return redirect()->route('activity_areas.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityArea $activity_area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivityArea $activity_area)
    {

        return view('settings.activity_areas.edit', compact('activity_area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActivityArea $activity_area)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $activity_area->title = $request->title;
        $activity_area->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityArea $activity_area)
    {
        $activity_area->delete();
        return redirect()->route('activity_areas.index')->with('message','Silindi');
    }
}
