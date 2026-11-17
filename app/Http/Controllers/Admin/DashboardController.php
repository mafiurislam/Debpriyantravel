<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\VideoReview;
use App\Models\Vehicle;
use App\Models\TourPackage;
use App\Models\Inquiry;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'sliders' => HeroSlider::count(),
            'services' => Service::count(),
            'specializations' => Specialization::count(),
            'videos' => VideoReview::count(),
            'vehicles' => Vehicle::count(),
            'packages' => TourPackage::count(),
            'inquiries' => Inquiry::count(),
            'new_inquiries' => Inquiry::where('status', 'new')->count(),
        ];

        $recentInquiries = Inquiry::latest()->take(8)->get();
        $services = Service::orderBy('sort_order', 'asc')->get();

        return view('admin.dashboard', compact('counts', 'recentInquiries', 'services'));
    }
}
