<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingStoreRequest;
use App\Http\Requests\MeetingUpdateRequest;
use App\Models\Customer;
use App\Models\Meeting;
use App\Models\Settings\ActivityArea;
use App\Models\Settings\Employee;
use App\Models\Settings\MeetingType;
use App\Models\Settings\PaymentCondition;
use App\Models\Settings\Sender;
use App\Models\Settings\ServiceOffer;
use App\Models\Settings\Source;
use App\Services\FileService;
use App\Services\SearchService;
use Illuminate\Http\Request;

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
        $senders = Sender::all();
        $field_activities = ActivityArea::all();
        $payment_conditions = PaymentCondition::all();
        $meeting_types = MeetingType::all();
        $service_offers = ServiceOffer::all();
        $sources = Source::all();
        $employees = Employee::all();

        return view('meetings.create', compact('corporates','senders','field_activities','payment_conditions','meeting_types','service_offers','sources','employees'));
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
        $senders = Sender::all();
        $field_activities = ActivityArea::all();
        $payment_conditions = PaymentCondition::all();
        $meeting_types = MeetingType::all();
        $service_offers = ServiceOffer::all();
        $sources = Source::all();
        $employees = Employee::all();
        return view('meetings.edit', compact('meeting', 'corporates','senders','field_activities','payment_conditions','meeting_types','service_offers','sources','employees'));
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


        $meeting->delete();

        return redirect()->back()->with('message', 'Görüş silindi.');

    }
}
