<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $payment_types = PaymentType::all();

        return view('settings.payment_types.index', compact('payment_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.payment_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $payment_type = new PaymentType();

        $request->validate([
            'title' =>'required'
        ]);

        $payment_type->title = $request->title;

        $payment_type->save();

        return redirect()->route('payment_types.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentType $payment_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentType $payment_type)
    {

        return view('settings.payment_types.edit', compact('payment_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentType $payment_type)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $payment_type->title = $request->title;
        $payment_type->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentType $payment_type)
    {
        $payment_type->delete();
        return redirect()->route('payment_types.index')->with('message','Silindi');
    }
}
