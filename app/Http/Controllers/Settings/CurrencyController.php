<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $currencies = Currency::all();

        return view('settings.currencies.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $currency = new Currency();

        $request->validate([
            'title' =>'required'
        ]);

        $currency->title = $request->title;

        $currency->save();

        return redirect()->route('currencies.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $currency)
    {

        return view('settings.currencies.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $currency->title = $request->title;
        $currency->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();
        return redirect()->route('currencies.index')->with('message','Silindi');
    }
}
