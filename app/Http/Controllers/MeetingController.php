<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingStoreRequest;
use App\Http\Requests\MeetingUpdateRequest;
use App\Models\Customer;
use App\Models\Meeting;
use App\Services\FileService;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MeetingController extends Controller
{

    public $searchService;
    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
        $this->middleware('permission:list-meetings|create-meetings|edit-meetings|delete-meetings', ['only' => ['index','show']]);
        $this->middleware('permission:create-meetings', ['only' => ['create','store']]);
        $this->middleware('permission:edit-meetings', ['only' => ['edit']]);
        $this->middleware('permission:delete-meetings', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {

        $data = $this->searchService->getData($request, 'meetings');

        $route = 'meetings.index';
        return view('meetings.index', compact('data','route'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $corporates = Customer::select('id','company_name', 'company_voen')->get();
        return view('meetings.create', compact('corporates'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(MeetingStoreRequest $request)
    {

        $validated = $request->validated();

        $fileUploadService = new FileService();
        $validated['service_offer_file'] =  $fileUploadService->uploadFile($request->service_offer_file, 'meetings');
        $validated['protocol_file'] =  $fileUploadService->uploadFile($request->protocol_file, 'meetings');

        Meeting::create($validated);

        return redirect()->route('meetings.index')->with('message', 'Görüş əlavə edildi.');

    }

    /**
     * Display the specified resource.
     */

    public function show(Meeting $meeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Meeting $meeting)
    {
        $corporates = Customer::select('id','company_name', 'company_voen')->get();
        return view('meetings.edit', compact('meeting', 'corporates'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(MeetingUpdateRequest $request, Meeting $meeting)
    {
        $validated = $request->validated();
        $fileUploadService = new FileService();

        if($request->service_offer_file){
            $validated['service_offer_file'] =  $fileUploadService->uploadFile($request->service_offer_file, 'meetings');
        }

        if($request->protocol_file){
            $validated['protocol_file'] =  $fileUploadService->uploadFile($request->protocol_file, 'meetings');
        }

        $meeting->update($validated);

        return redirect()->back()->with('message', 'Görüş update edildi.');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Meeting $meeting)
    {

//        if ($meeting->contrmeeting_file) {
//            Storage::disk('public')->delete('contrmeetings/' . $meeting->contrmeeting_file);
//        }

        $meeting->delete();

        return redirect()->back()->with('message', 'Görüş silindi.');

    }
}
