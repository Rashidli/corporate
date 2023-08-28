<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $sources = Source::all();

        return view('settings.sources.index', compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $source = new Source();

        $request->validate([
            'title' =>'required'
        ]);

        $source->title = $request->title;

        $source->save();

        return redirect()->route('sources.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Source $source)
    {

        return view('settings.sources.edit', compact('source'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Source $source)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $source->title = $request->title;
        $source->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Source $source)
    {
        $source->delete();
        return redirect()->route('sources.index')->with('message','Silindi');
    }
}
