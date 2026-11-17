<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'phone' => 'required|string|max:30',
            'email' => 'nullable|email|max:150',
            'service_type' => 'nullable|string|max:150',
            'vehicle_preferred' => 'nullable|string|max:150',
            'journey_date' => 'nullable|string|max:50',
            'pickup_location' => 'nullable|string|max:150',
            'drop_location' => 'nullable|string|max:150',
            'passengers' => 'nullable|integer',
            'message' => 'nullable|string',
        ]);

        $inquiry = Inquiry::create($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your inquiry has been received! Our dispatch office will call you shortly.',
                'inquiry' => $inquiry
            ]);
        }

        return back()->with('success', 'Your inquiry has been received successfully! Our team will contact you shortly.');
    }
}
