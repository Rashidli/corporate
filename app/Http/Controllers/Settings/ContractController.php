<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $contracts = Contract::all();

        return view('settings.contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.contracts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $contract = new Contract();

        $request->validate([
            'title' =>'required'
        ]);

        $contract->title = $request->title;

        $contract->save();

        return redirect()->route('contracts.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {

        return view('settings.contracts.edit', compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $contract->title = $request->title;
        $contract->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect()->route('contracts.index')->with('message','Silindi');
    }
}
