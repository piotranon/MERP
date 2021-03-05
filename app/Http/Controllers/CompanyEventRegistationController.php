<?php

namespace App\Http\Controllers;

use App\Models\CompanyEvent;
use App\Models\CompanyEventRegistation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyEventRegistationController extends Controller
{
    public function register($companyEventId, $request)
    {
        $companyEvent = CompanyEvent::findOrFail($companyEventId);

        $data = $request->validate(
            ['name' => 'required|string|max:150']
        );

        $data = array_merge(
            [
                'reservation_code' => Str::uuid(),
                'company_event_id' => $companyEventId
            ],
            $data
        );

        $registration = CompanyEventRegistation::create($data);

        return redirect()->route('companyEvents.index')
            ->with('success', 'Succesfully registered for event ' . $companyEvent->title . '. Your registration code is: ' . $registration->reservation_code);
    }

    public function removeRegistration($registrationCode)
    {
        $registration = CompanyEventRegistation::where('reservation_code', $registrationCode)->firstOrFail();

        if (Carbon::now()->diffInDays(Carbon::parse($registration->created_at)) < 2)
            return redirect()->route('companyEvents.index')
                ->with('success', 'Reservation was made longer than 2 days ago.');

        $event = CompanyEvent::findOrFail($registration->company_event_id);

        if (Carbon::now()->diffInDays(Carbon::parse($event->start_date)) < 2)
            return redirect()->route('companyEvents.index')
                ->with('success', 'Reservation cannot be cancelled 2 days before event.');

        $registration->delete();

        return redirect()->route('companyEvents.index')
            ->with('success', 'Reservation deleted.');
    }
}
