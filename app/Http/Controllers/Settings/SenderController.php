<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\Sender;
use Illuminate\Http\Request;

class SenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $senders = Sender::all();

        return view('settings.senders.index', compact('senders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.senders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $sender = new Sender();

        $request->validate([
            'title' =>'required'
        ]);

        $sender->title = $request->title;

        $sender->save();

        return redirect()->route('senders.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(Sender $sender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sender $sender)
    {

        return view('settings.senders.edit', compact('sender'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sender $sender)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $sender->title = $request->title;
        $sender->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sender $sender)
    {
        $sender->delete();
        return redirect()->route('senders.index')->with('message','Silindi');
    }
}
