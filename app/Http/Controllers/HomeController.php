<?php

namespace App\Http\Controllers;

use App\Models\HeroSlider;
use App\Models\RouteHighlight;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\VideoReview;
use App\Models\Vehicle;
use App\Models\TourPackage;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $routeHighlight = RouteHighlight::first();
        $services = Service::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $specializations = Specialization::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $videoReviews = VideoReview::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        $vehicles = Vehicle::where('is_active', true)->orderBy('sort_order', 'asc')->get();

        return view('pages.home', compact('sliders', 'routeHighlight', 'services', 'specializations', 'videoReviews', 'vehicles'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        return view('pages.services', compact('services'));
    }

    public function packages()
    {
        $packages = TourPackage::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        return view('pages.packages', compact('packages'));
    }

    public function carRental()
    {
        $vehicles = Vehicle::where('is_active', true)->orderBy('sort_order', 'asc')->get();
        return view('pages.car-rental', compact('vehicles'));
    }

    public function busBooking()
    {
        $routeHighlight = RouteHighlight::first();
        return view('pages.bus-booking', compact('routeHighlight'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
