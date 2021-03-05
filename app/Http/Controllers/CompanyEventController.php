<?php

namespace App\Http\Controllers;

use App\Models\CompanyEvent;
use App\Models\CompanyEventRegistation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class CompanyEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyEvents = CompanyEvent::latest()->paginate(5);

        return view('companyEvents.index', compact('companyEvents'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companyEvents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->get('start_date'));
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'start_date' => 'required|date_format:Y-m-d\TH:i:s',
            'end_date' => 'required|date_format:Y-m-d\TH:i:s',
            'thumbnail' => 'nullable|mimes:jpg,png|max:2048'
        ]);

        if (Arr::exists($data, 'thumbnail')) {
            $image = $request->file('thumbnail');
            $thumbnailName = Carbon::now() . '.' . $image->extension();
            $thumbnailName = str_replace(" ", "_", $thumbnailName);
            // dd($thumbnailName);
            $request->thumbnail->storeAs('/public/uploads/companyEventsThumbnails', $thumbnailName);

            $data = array_merge(['thumbnail' => $thumbnailName], $data);
        }

        $data = array_merge(
            [
                'start_date' => Carbon::parse($data['start_date']),
                'end_date' => Carbon::parse($data['end_date'])
            ],
            $data
        );

        dd($data);
        CompanyEvent::create($data);
        return redirect()->route('companyEvents.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyEvent  $companyEvent
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyEvent $companyEvent)
    {
        return view('companyEvents.show', compact('companyEvent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyEvent  $companyEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyEvent $companyEvent)
    {
        return view('companyEvents.edit', compact('companyEvent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyEvent  $companyEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyEvent $companyEvent)
    {
        return redirect()->route('companyEvents.show', compact('companyEvent'))
            ->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyEvent  $companyEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyEvent $companyEvent)
    {
        // delete all registration for that event
        $registrations = CompanyEventRegistation::where('company_event_id', $companyEvent->id)->get();
        foreach ($registrations as $registration)
            $registration->delete();

        // delete the event
        $companyEvent->delete();

        return redirect()->route('companyEvents.index')
            ->with('success', 'Event deleted successfully');
    }
}
