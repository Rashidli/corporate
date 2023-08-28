<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\CompanyAddress;
use Illuminate\Http\Request;

class CompanyAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $company_addresses = CompanyAddress::all();

        return view('settings.company_addresses.index', compact('company_addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.company_addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $company_address = new CompanyAddress();

        $request->validate([
            'title' =>'required'
        ]);

        $company_address->title = $request->title;

        $company_address->save();

        return redirect()->route('company_addresses.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyAddress $company_address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyAddress $company_address)
    {

        return view('settings.company_addresses.edit', compact('company_address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyAddress $company_address)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $company_address->title = $request->title;
        $company_address->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyAddress $company_address)
    {
        $company_address->delete();
        return redirect()->route('company_addresses.index')->with('message','Silindi');
    }
}
