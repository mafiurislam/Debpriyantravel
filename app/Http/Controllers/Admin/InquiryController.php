<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inquiry::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $inquiries = $query->paginate(15);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function updateStatus(Request $request, Inquiry $inquiry)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:new,contacted,confirmed,cancelled',
        ]);

        $inquiry->update($validated);

        return back()->with('success', 'Inquiry status updated to ' . ucfirst($validated['status']));
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return back()->with('success', 'Inquiry record deleted successfully!');
    }
}
