<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CustomerController extends Controller
{

    public $searchService;
    public function __construct(SearchService $searchService)
    {

        $this->searchService = $searchService;
        $this->middleware('permission:list-customers|create-customers|edit-customers|delete-customers', ['only' => ['index','show']]);
        $this->middleware('permission:create-customers', ['only' => ['create','store']]);
        $this->middleware('permission:edit-customers', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-customers', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {

        $data = $this->searchService->getData($request, 'customers');

        $route = 'customers.index';

        return view('customers.index', compact('data','route'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(CustomerStoreRequest $request)
    {

        $validated = $request->validated();

        if ($request->hasFile('contract_file')) {
            $file = $request->file('contract_file');
            $contractFileName = time() . '_' . Str::slug($file->getClientOriginalName());
            $file->storeAs('contracts', $contractFileName, 'public');
            $validated['contract_file'] = $contractFileName;
        }

        Customer::create($validated);

        return redirect()->route('customers.index')->with('message', 'Müştəri əlavə edildi.');

    }

    /**
     * Display the specified resource.
     */

    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        $validated = $request->validated();

        if ($request->hasFile('contract_file')) {

            $file = $request->file('contract_file');
            $contractFileName =  time() . '_' . Str::slug($file->getClientOriginalName());
            $file->storeAs('contracts', $contractFileName, 'public');

            if ($customer->contract_file) {
                Storage::disk('public')->delete('contracts/' . $customer->contract_file);
            }

            $validated['contract_file'] = $contractFileName;

        }

        $customer->update($validated);

        return redirect()->back()->with('message', 'Məlumat update edildi.');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Customer $customer)
    {

//        if ($customer->contract_file) {
//            Storage::disk('public')->delete('contracts/' . $customer->contract_file);
//        }

        $customer->delete();

        return redirect()->back()->with('message', 'Məlumat silindi.');

    }

//    public function search(Request $request)
//    {
//
//
//
//
//
//
//    }
}
