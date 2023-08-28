<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\CompanyName;
use Illuminate\Http\Request;

class CompanyNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $company_names = CompanyName::all();

        return view('settings.company_names.index', compact('company_names'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.company_names.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $company_name = new CompanyName();

        $request->validate([
            'title' =>'required'
        ]);

        $company_name->title = $request->title;

        $company_name->save();

        return redirect()->route('company_names.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyName $company_name)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyName $company_name)
    {

        return view('settings.company_names.edit', compact('company_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyName $company_name)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $company_name->title = $request->title;
        $company_name->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyName $company_name)
    {
        $company_name->delete();
        return redirect()->route('company_names.index')->with('message','Silindi');
    }
}
