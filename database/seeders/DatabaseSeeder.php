<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\HeroSlider;
use App\Models\RouteHighlight;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\VideoReview;
use App\Models\Vehicle;
use App\Models\TourPackage;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User (Requested credentials: adminat@12345 / admin123)
        User::updateOrCreate(
            ['email' => 'adminat@12345'],
            [
                'name' => 'Debpriyan Admin',
                'username' => 'adminat@12345',
                'email' => 'adminat@12345',
                'password' => Hash::make('admin123'),
            ]
        );

        // Also add an email-formatted duplicate fallback just in case
        User::updateOrCreate(
            ['username' => 'adminat@12345'],
            [
                'name' => 'Debpriyan Admin',
                'username' => 'adminat@12345',
                'email' => 'adminat@12345',
                'password' => Hash::make('admin123'),
            ]
        );

        // 2. Settings
        $settings = [
            'site_name' => 'Debpriyan Travels',
            'site_tagline' => 'Your Journey, Our Responsibility',
            'bengali_tagline' => 'সহজ বুকিং, নিশ্চিন্ত যাত্রা, সেরা পরিষেবা',
            'phone_1' => '9433053668',
            'phone_2' => '9432430360',
            'whatsapp_number' => '919433053668',
            'email' => 'debpriyan2021@gmail.com',
            'address' => 'Kolkata - 700161, West Bengal',
            'about_short' => 'Debpriyan Travels & Transport Solution in Kolkata provides daily bus tickets across India, luxury car rentals (Swift Dzire, Innova Crysta), tempo traveller hire, and dedicated corporate & government protocol travel support.',
            'meta_description' => 'Debpriyan Travels & Transport Solution in Kolkata. Bus ticket booking across India, car rental (Innova, Dzire, EV), tempo traveller hire, corporate & govt travel support. Call 9433053668.',
            'quick_help_number' => '9433053668',
        ];

        foreach ($settings as $key => $val) {
            Setting::updateOrCreate(['key' => $key], ['value' => $val, 'label' => ucwords(str_replace('_', ' ', $key))]);
        }

        // 3. Hero Sliders
        $sliders = [
            [
                'title' => 'Kolkata to All India Luxury Bus Service',
                'bengali_title' => 'কলকাতা থেকে সমগ্র ভারতে নিরাপদ ও বিলাসবহুল ভ্রমণ',
                'badge' => '24/7 Premium Bus Booking',
                'description' => 'Daily AC deluxe & sleeper buses to Siliguri, Digha, Varanasi, Asansol, Delhi, Mumbai, Chennai, and Hyderabad. Comfortable pushback seats & certified drivers.',
                'image' => 'assets/images/slider/slide-sujata-tempo.webp',
                'button_text' => 'Book Bus Ticket',
                'button_link' => 'bus-booking',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Executive Car & Luxury Tempo Fleet',
                'bengali_title' => 'আধুনিক গাড়ির বিশাল সম্ভার ও নির্ভরযোগ্য সেবা',
                'badge' => 'Special Corporate Rates',
                'description' => 'Hire Swift Dzire, Innova Crysta, and luxury tempo travellers for outstation trips, family holidays, airport transfers, and VIP corporate travel.',
                'image' => 'assets/images/slider/slide-luxury-bus.jpg',
                'button_text' => 'Explore Fleet',
                'button_link' => 'car-rental',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Official Protocol & Delegation Transit',
                'bengali_title' => 'সরকারি দপ্তর ও কর্পোরেট প্রোটোকল ভ্রমণ সহায়তা',
                'badge' => 'Govt & Corporate Partner',
                'description' => 'Trusted transport vendor for West Bengal government departments, public sector units, and major corporate events across Bengal and East India.',
                'image' => 'assets/images/slider/slide-tourist-coach.jpg',
                'button_text' => 'Corporate Inquiry',
                'button_link' => 'services',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Handcrafted Tour Packages & Pilgrimages',
                'bengali_title' => 'সুন্দরবন, দিঘা, দার্জিলিং ও মায়াপুর স্পেশাল প্যাকেজ',
                'badge' => 'All Bengal & India Tours',
                'description' => 'Customized group tours to Sundarbans, Digha-Mandarmani, Darjeeling-Gangtok hills, and Mayapur Iskcon. Complete transport, hotels & food included.',
                'image' => 'assets/images/slider/slide-travel-fleet.jpg',
                'button_text' => 'View Packages',
                'button_link' => 'packages',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($sliders as $slide) {
            HeroSlider::create($slide);
        }

        // 4. Route Highlights Banner
        RouteHighlight::create([
            'badge' => 'PAN-INDIA CONNECTIVITY',
            'title' => 'All India Bus Booking Ticket Available',
            'bengali_tagline' => 'সহজ বুকিং, নিশ্চিন্ত যাত্রা, সেরা পরিষেবা',
            'description' => 'Connect seamlessly from Kolkata to destinations all over the nation. Sleeper, AC Deluxe, Seater, and Volvo buses with comfortable pushback seats.',
            'image' => 'assets/images/banners/banner-routes.jpg',
            'routes' => 'SILIGURI, DIGHA, ASANSOL, VARANASI, DELHI, MUMBAI, CHENNAI, HYDERABAD',
            'phone' => '9432430360',
            'email' => 'debpriyan2021@gmail.com',
            'address' => 'KOLKATA-700161',
        ]);

        // 5. Core Services
        $services = [
            [
                'title' => 'Car Rental (Self Drive / With Driver)',
                'bengali_subtitle' => 'গাড়ি ভাড়া (সেলফ ড্রাইভ / ড্রাইভার সহ)',
                'category' => 'Fleet / Rental',
                'description' => "Car type: Dzire\nCar: Private / Comercial both\nRate: ₹150/- per hour & ₹15 per km",
                'icon' => 'fa-solid fa-car',
                'image' => 'assets/images/sedan.jpg',
                'btn_text' => 'Book Car Rental',
                'whatsapp_message' => 'Hello Debpriyan Travels, I want to inquire about Dzire Car Rental (Private / Commercial - Rs.150/hr & Rs.15/km). Please confirm availability.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Govt Office Travel Support',
                'bengali_subtitle' => 'সরকারি দপ্তরের জন্য সরকারি ভ্রমণ সহায়তা',
                'category' => 'Government Protocol',
                'description' => 'Official protocol travel support, VIP delegations, government department transport contracts, and conference travel with top security standards.',
                'icon' => 'fa-solid fa-landmark',
                'image' => 'assets/images/suv.jpg',
                'btn_text' => 'Official Booking',
                'whatsapp_message' => 'Hello Debpriyan Travels, I want to inquire about Government Office Travel Support and official transport contracts.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Corporate Office Business Travel',
                'bengali_subtitle' => 'কর্পোরেট বিজনেস ট্রাভেল সলিউশন',
                'category' => 'Corporate Transport',
                'description' => 'End-to-end corporate transport solutions, employee shuttle services, executive airport transfers, client visits, and business tour fleet management.',
                'icon' => 'fa-solid fa-building',
                'image' => 'assets/images/pkg-airport.jpg',
                'btn_text' => 'Corporate Inquiry',
                'whatsapp_message' => 'Hello Debpriyan Travels, I want to inquire about Corporate Office Business Travel and employee transport solutions.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Gari Vara (Daily / Monthly Rental)',
                'bengali_subtitle' => 'দৈনিক ও মাসিক গাড়ি ভাড়া (সেরা রেট)',
                'category' => 'Long Term Hire',
                'description' => 'Affordable daily, weekly, and monthly car hire contracts for families, businesses, long-term visitors, and events with dedicated drivers and maintenance.',
                'icon' => 'fa-solid fa-calendar-days',
                'image' => 'assets/images/tempo-large.jpg',
                'btn_text' => 'Book Monthly / Daily',
                'whatsapp_message' => 'Hello Debpriyan Travels, I want to inquire about Gari Vara Daily/Monthly Rental options and package rates.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Wedding & Event Fleet',
                'bengali_subtitle' => 'বিয়ে ও পারিবারিক অনুষ্ঠানের গাড়ি ও বাস',
                'category' => 'Events & Occasions',
                'description' => 'Complete fleet arrangement for marriage parties (barat), family tours, picnics, and pilgrimage trips with decorated luxury cars and luxury tempo travellers.',
                'icon' => 'fa-solid fa-champagne-glasses',
                'image' => 'assets/images/slider/slide-tourist-coach.jpg',
                'btn_text' => 'Book for Events',
                'whatsapp_message' => 'Hello Debpriyan Travels, I want to inquire about Wedding and Event Fleet booking (Luxury cars and Tempo Travellers).',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // 6. Specializations / Core Categories
        $specializations = [
            [
                'title' => 'Bus Ticket Booking',
                'bengali_subtitle' => 'বাস টিকিট বুকিং',
                'image' => 'assets/images/tempo-small.jpg',
                'btn_text' => 'Explore Routes',
                'btn_link' => 'bus-booking',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'All India Ticket Booking',
                'bengali_subtitle' => 'বাস টিকিট বুকিং (সমগ্র ভারত)',
                'image' => 'assets/images/banners/sujata-bus.jpg',
                'btn_text' => 'Book Bus Ticket',
                'btn_link' => 'https://wa.me/919433053668?text=Hello%20Debpriyan%20Travels,%20I%20want%20to%20book%20an%20All%20India%20Bus%20Ticket.%20Please%20share%20routes%20and%20seat%20availability.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Car Rental',
                'bengali_subtitle' => 'গাড়ি ভাড়া',
                'image' => 'assets/images/sedan.jpg',
                'btn_text' => 'View Cabs',
                'btn_link' => 'car-rental',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Bus Rental',
                'bengali_subtitle' => 'বাস ভাড়া',
                'image' => 'assets/images/tempo-small.jpg',
                'btn_text' => 'Hire Bus',
                'btn_link' => 'services',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($specializations as $spec) {
            Specialization::create($spec);
        }

        // 7. Video Reviews
        $videos = [
            [
                'title' => 'Tempo Traveller Kolkata - Sujata Travels Review 1',
                'youtube_id' => 'ae9BJzASXNI',
                'thumbnail' => 'assets/images/video-thumb-1.webp',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Tempo Traveller Kolkata - Sujata Travels Review 2',
                'youtube_id' => '7yuJ33wLjzM',
                'thumbnail' => 'assets/images/video-thumb-2.webp',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Tempo Traveller Kolkata - Sujata Travels Review 3',
                'youtube_id' => 'LCvxVKEv7O0',
                'thumbnail' => 'assets/images/video-thumb-3.webp',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Tempo Traveller Kolkata - Sujata Travels Review 4',
                'youtube_id' => 'AfLAY3lyPmM',
                'thumbnail' => 'assets/images/video-thumb-4.webp',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Tempo Traveller Kolkata - Sujata Travels Review 5',
                'youtube_id' => 'oidGqW5EFn4',
                'thumbnail' => 'assets/images/video-thumb-5.webp',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($videos as $vid) {
            VideoReview::create($vid);
        }

        // 8. Fleet Vehicles
        $vehicles = [
            [
                'name' => 'Maruti Swift Dzire Sedan',
                'category' => 'Sedan',
                'capacity' => '4 Seater + Driver',
                'rate_hourly' => '₹150 / hr',
                'rate_km' => '₹15 / km',
                'rate_package' => 'Local Drop ₹899 | 8hr/80km ₹1,899',
                'features' => 'Air Conditioned, Pushback Seats, Chauffeur / Self-drive option, Fuel-efficient',
                'image' => 'assets/images/sedan.jpg',
                'whatsapp_message' => 'Hello Debpriyan Travels, I want to book Swift Dzire Sedan (Rs.150/hr & Rs.15/km).',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Toyota Innova Crysta',
                'category' => 'SUV',
                'capacity' => '7 Seater + Driver',
                'rate_hourly' => '₹250 / hr',
                'rate_km' => '₹22 / km',
                'rate_package' => 'Local Drop ₹1,599 | 8hr/80km ₹2,799',
                'features' => 'Dual AC, Reclining Captain Seats, Premium Sound, Large Luggage Space',
                'image' => 'assets/images/suv.jpg',
                'whatsapp_message' => 'Hello Debpriyan Travels, I want to book Innova Crysta SUV.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Force Tempo Traveller (12 to 26 Seater)',
                'category' => 'Tempo Traveller',
                'capacity' => '12-26 Seater',
                'rate_hourly' => 'Package Rates',
                'rate_km' => '₹28 - ₹35 / km',
                'rate_package' => 'Outstation / Family Tour Special Rate',
                'features' => 'Pushback 2x1 & 2x2 luxury seats, AC vents per seat, LED TV, Charging ports',
                'image' => 'assets/images/tempo-large.jpg',
                'whatsapp_message' => 'Hello Debpriyan Travels, I want to inquire about Tempo Traveller hire.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Luxury Tourist Coach & AC Sleeper Bus',
                'category' => 'Bus',
                'capacity' => '35 to 55 Seater',
                'rate_hourly' => 'Per Day Contract',
                'rate_km' => 'Contract Basis',
                'rate_package' => 'All India Permit Coach',
                'features' => 'Air Suspension, Chilled AC, Reclining Seats / Sleepers, Large boot space',
                'image' => 'assets/images/slider/slide-luxury-bus.jpg',
                'whatsapp_message' => 'Hello Debpriyan Travels, I want to hire Luxury Bus / Coach.',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($vehicles as $veh) {
            Vehicle::create($veh);
        }

        // 9. Tour Packages
        $packages = [
            [
                'name' => 'Sundarbans Wildlife & Mangrove Safari',
                'bengali_name' => 'সুন্দরবন জঙ্গল ও ক্যানিং সাফারি ট্যুর',
                'destination' => 'Sundarbans National Park',
                'duration' => '2 Days / 1 Night & 3D/2N',
                'price' => '₹3,500 / person',
                'description' => 'Experience Royal Bengal Tiger habitats, thrilling boat safari, Sajnekhali watchtower, canopy walk, and local cultural Baul songs.',
                'highlights' => 'Boat Cruise, Tiger Camp, Mangrove Safari, All Meals, Kolkata pickup',
                'inclusions' => 'Pick & Drop from Kolkata, Boat Cruise, Forest Entry, AC/Non-AC Stay, All Meals',
                'image' => 'assets/images/pkg-sundarbans.jpg',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Digha & Mandarmani Weekend Beach Tour',
                'bengali_name' => 'দিঘা ও মন্দারমণি সমুদ্র সৈকত ভ্রমণ',
                'destination' => 'Digha & Mandarmani',
                'duration' => '3 Days / 2 Nights',
                'price' => '₹4,200 / person',
                'description' => 'Relax by the Bay of Bengal, drive on Mandarmani beach, enjoy fresh seafood, Marine Aquarium, and Tajpur virgin beach.',
                'highlights' => 'Sea Beach Resort, Private AC Cab / Tempo, Local Sightseeing, Water Sports guidance',
                'inclusions' => 'AC Vehicle, Deluxe Hotel Stay, Breakfast, Sightseeing',
                'image' => 'assets/images/pkg-digha.jpg',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Darjeeling & Gangtok Himalayan Splendour',
                'bengali_name' => 'দার্জিলিং ও গ্যাংটক পাহাড়ি ভ্রমণ প্যাকেজ',
                'destination' => 'North Bengal & Sikkim',
                'duration' => '5 Days / 4 Nights',
                'price' => '₹9,800 / person',
                'description' => 'Marvel at Kanchenjunga sunrise from Tiger Hill, Batasia Loop, tea gardens, Tsomgo Lake, Baba Mandir, and MG Marg.',
                'highlights' => 'Tiger Hill, Batasia Loop, Mirik Lake, Tsomgo Lake, Gangtok local',
                'inclusions' => 'NJP / Bagdogra Pick & Drop, Mountain View Hotel, Breakfast & Dinner, Permit support',
                'image' => 'assets/images/pkg-darjeeling.jpg',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Mayapur & Nabadwip Spiritual Pilgrimage',
                'bengali_name' => 'মায়াপুর ইসকন ও নবদ্বীপ তীর্থ ভ্রমণ',
                'destination' => 'Nadia, West Bengal',
                'duration' => '1 Day / 2 Days',
                'price' => '₹1,800 / person',
                'description' => 'Visit world-famous ISKCON Temple of Vedic Planetarium (TOVP), Yogapeeth, Rajapur Jagannath Temple, and sacred Ganges aarti.',
                'highlights' => 'ISKCON TOVP Temple, Ganges Aarti, Chaitanya Mahaprabhu birthplace, Prasadam',
                'inclusions' => 'Same-day AC Cab / Tempo, Toll & Parking, Driver allowance',
                'image' => 'assets/images/pkg-mayapur.jpg',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($packages as $pkg) {
            TourPackage::create($pkg);
        }
    }
}
