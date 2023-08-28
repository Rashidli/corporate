<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentStoreRequest;
use App\Http\Requests\PaymentUpdateRequest;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Settings\Bank;
use App\Models\Settings\Currency;
use App\Models\Settings\Institution;
use App\Models\Settings\PaymentType;
use App\Services\SearchService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }
    public function index(Request $request)
    {

        $data = $this->searchService->getData($request,'payments');
        $route = 'payments.index';


        return view('payments.index', compact('data','route'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $corporates = Customer::select('id','company_name', 'company_voen')->get();
        $institutions = Institution::all();
        $currencies = Currency::all();
        $payment_types = PaymentType::all();
        $banks = Bank::all();
        return view('payments.create', compact('corporates','institutions','currencies','payment_types','banks'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(PaymentStoreRequest $request)
    {

        $validated = $request->validated();

        Payment::create($validated);

        return redirect()->route('payments.index')->with('message', 'Əsas ödəniş əlavə edildi.');

    }

    /**
     * Display the specified resource.
     */

    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Payment $payment)
    {
        $corporates = Customer::select('id','company_name', 'company_voen')->get();
        $institutions = Institution::all();
        $currencies = Currency::all();
        $payment_types = PaymentType::all();
        $banks = Bank::all();
        return view('payments.edit', compact('payment','corporates','institutions','currencies','payment_types','banks'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(PaymentUpdateRequest $request, Payment $payment)
    {
        $validated = $request->validated();

        $payment->update($validated);

        return redirect()->back()->with('message', 'Əsas ödəniş update edildi.');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Payment $payment)
    {

//        if ($payment->contract_file) {
//            Storage::disk('public')->delete('contracts/' . $payment->contract_file);
//        }

        $payment->delete();

        return redirect()->back()->with('message', 'Əsas ödəniş silindi.');

    }
}
