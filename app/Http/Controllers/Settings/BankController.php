<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $banks = Bank::all();

        return view('settings.banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $bank = new Bank();

        $request->validate([
            'title' =>'required'
        ]);

        $bank->title = $request->title;

        $bank->save();

        return redirect()->route('banks.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {

        return view('settings.banks.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bank $bank)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $bank->title = $request->title;
        $bank->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('banks.index')->with('message','Silindi');
    }
}
