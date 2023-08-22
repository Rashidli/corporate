<?php

namespace App\Http\Controllers;

use App\Http\Requests\VatStoreRequest;
use App\Http\Requests\VatUpdateRequest;
use App\Models\Customer;
use App\Models\Vat;
use App\Services\SearchService;
use Illuminate\Http\Request;

class VatController extends Controller
{
    public  $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;

    }

    public function index(Request $request)
    {
        $data = $this->searchService->getData($request, 'vats');
        $route = 'vats.index';
        return view('vats.index', compact('route','data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $corporates = Customer::select('id','company_name', 'company_voen')->get();
        return view('vats.create', compact('corporates'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(VatStoreRequest $request)
    {

        $validated = $request->validated();

        Vat::create($validated);

        return redirect()->route('vats.index')->with('message', 'ƏDV ödəniş əlavə edildi.');

    }

    /**
     * Display the specified resource.
     */

    public function show(Vat $vat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Vat $vat)
    {
        $corporates = Customer::select('id','company_name', 'company_voen')->get();
        return view('vats.edit', compact('vat','corporates'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(VatUpdateRequest $request, Vat $vat)
    {

        $validated = $request->validated();

        $vat->update($validated);

        return redirect()->back()->with('message', 'ƏDV ödəniş update edildi.');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Vat $vat)
    {

//        if ($vat->contract_file) {
//            Storage::disk('public')->delete('contracts/' . $vat->contract_file);
//        }

        $vat->delete();

        return redirect()->back()->with('message', 'ƏDV ödəniş silindi.');

    }
}
