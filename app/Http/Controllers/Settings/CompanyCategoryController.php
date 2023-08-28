<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\CompanyCategory;
use Illuminate\Http\Request;

class CompanyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $company_categories = CompanyCategory::all();

        return view('settings.company_categories.index', compact('company_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.company_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $company_category = new CompanyCategory();

        $request->validate([
            'title' =>'required'
        ]);

        $company_category->title = $request->title;

        $company_category->save();

        return redirect()->route('company_categories.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyCategory $company_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyCategory $company_category)
    {

        return view('settings.company_categories.edit', compact('company_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyCategory $company_category)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $company_category->title = $request->title;
        $company_category->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyCategory $company_category)
    {
        $company_category->delete();
        return redirect()->route('company_categories.index')->with('message','Silindi');
    }
}
