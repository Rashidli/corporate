<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\ServiceOffer;
use Illuminate\Http\Request;

class ServiceOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $service_offers = ServiceOffer::all();

        return view('settings.service_offers.index', compact('service_offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.service_offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $service_offer = new ServiceOffer();

        $request->validate([
            'title' =>'required'
        ]);

        $service_offer->title = $request->title;

        $service_offer->save();

        return redirect()->route('service_offers.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceOffer $service_offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceOffer $service_offer)
    {

        return view('settings.service_offers.edit', compact('service_offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceOffer $service_offer)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $service_offer->title = $request->title;
        $service_offer->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceOffer $service_offer)
    {
        $service_offer->delete();
        return redirect()->route('service_offers.index')->with('message','Silindi');
    }
}
