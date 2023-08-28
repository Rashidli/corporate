<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Settings\PaymentCondition;
use Illuminate\Http\Request;

class PaymentConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $payment_conditions = PaymentCondition::all();

        return view('settings.payment_conditions.index', compact('payment_conditions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.payment_conditions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $payment_condition = new PaymentCondition();

        $request->validate([
            'title' =>'required'
        ]);

        $payment_condition->title = $request->title;

        $payment_condition->save();

        return redirect()->route('payment_conditions.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentCondition $payment_condition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentCondition $payment_condition)
    {

        return view('settings.payment_conditions.edit', compact('payment_condition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentCondition $payment_condition)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $payment_condition->title = $request->title;
        $payment_condition->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentCondition $payment_condition)
    {
        $payment_condition->delete();
        return redirect()->route('payment_conditions.index')->with('message','Silindi');
    }
}
