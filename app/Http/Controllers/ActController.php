<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActStoreRequest;
use App\Http\Requests\ActUpdateRequest;
use App\Models\Act;
use App\Models\Customer;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ActController extends Controller
{
    public $searchService;

    public function __construct(SearchService $searchService)

    {

        $this->searchService = $searchService;
        $this->middleware('permission:list-acts|create-acts|edit-acts|delete-acts', ['only' => ['index','show']]);
        $this->middleware('permission:create-acts', ['only' => ['create','store']]);
        $this->middleware('permission:edit-acts', ['only' => ['edit']]);
        $this->middleware('permission:delete-acts', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {

        $data = $this->searchService->getData($request, 'acts');

        $route = 'acts.index';
        return view('acts.index', compact( 'data','route'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $corporates = Customer::select('id','company_name', 'company_voen')->get();
        return view('acts.create', compact('corporates'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(ActStoreRequest $request)
    {

        $validated = $request->validated();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $contractFileName = time() . '_' . Str::slug($file->getClientOriginalName());
            $file->storeAs('acts', $contractFileName, 'public');
            $validated['file'] = $contractFileName;
        }

        Act::create($validated);

        return redirect()->route('acts.index')->with('message', 'Akt əlavə edildi.');

    }

    /**
     * Display the specified resource.
     */

    public function show(Act $act)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Act $act)
    {
        $corporates = Customer::select('id','company_name', 'company_voen')->get();
        return view('acts.edit', compact('act', 'corporates'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(ActUpdateRequest $request, Act $act)
    {
        $validated = $request->validated();

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $contractFileName =  time() . '_' . Str::slug($file->getClientOriginalName());
            $file->storeAs('contracts', $contractFileName, 'public');

            if ($act->contract_file) {
                Storage::disk('public')->delete('acts/' . $act->contract_file);
            }

            $validated['file'] = $contractFileName;

        }

        $act->update($validated);

        return redirect()->back()->with('message', 'Akt update edildi.');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Act $act)
    {

//        if ($act->contract_file) {
//            Storage::disk('public')->delete('contracts/' . $act->contract_file);
//        }

        $act->delete();

        return redirect()->back()->with('message', 'Akt silindi.');

    }
}
