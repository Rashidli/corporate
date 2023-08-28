<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\CompanyType;
use Illuminate\Http\Request;

class CompanyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $company_types = CompanyType::all();

        return view('settings.company_types.index', compact('company_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.company_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $company_type = new CompanyType();

        $request->validate([
            'title' =>'required'
        ]);

        $company_type->title = $request->title;

        $company_type->save();

        return redirect()->route('company_types.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyType $company_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyType $company_type)
    {

        return view('settings.company_types.edit', compact('company_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyType $company_type)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $company_type->title = $request->title;
        $company_type->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyType $company_type)
    {
        $company_type->delete();
        return redirect()->route('company_types.index')->with('message','Silindi');
    }
}
