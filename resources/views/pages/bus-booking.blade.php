@extends('layouts.app')

@section('title', 'All India Bus Booking & Luxury Bus Hire | ' . \App\Models\Setting::get('site_name', 'Debpriyan Travels'))

@section('content')

  <!-- INNER HERO -->
  <div class="inner-page-hero">
    <div class="container">
      <h1>All India Bus Booking &amp; Luxury Bus Hire</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Bus Booking</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- ROUTE HIGHLIGHT BOX -->
  <section class="section-padding">
    <div class="container">
      <div class="row align-items-center gy-4 mb-5">
        <div class="col-lg-6">
          <span class="section-badge">Nationwide Connectivity</span>
          <h2 class="section-title">{{ $routeHighlight ? $routeHighlight->title : 'All India Bus Booking Ticket Available' }}</h2>
          <span class="bengali-tagline fs-5">{{ $routeHighlight ? $routeHighlight->bengali_tagline : 'সহজ বুকিং, নিশ্চিন্ত যাত্রা, সেরা পরিষেবা' }}</span>
          <p class="text-muted">
            {{ $routeHighlight ? $routeHighlight->description : 'Debpriyan Travels is your trusted travel partner connecting Kolkata with major destinations across India.' }}
          </p>
          <div class="p-3 bg-light rounded-3 border mb-4">
            <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-map-location-dot text-primary me-2"></i> Major Connected Bus Routes:</h6>
            <div class="d-flex flex-wrap gap-2">
              @if($routeHighlight)
                @foreach(array_map('trim', explode(',', $routeHighlight->routes)) as $route)
                  @if(!empty($route))
                  <span class="badge bg-primary px-3 py-2">Kolkata ⇄ {{ $route }}</span>
                  @endif
                @endforeach
              @else
                <span class="badge bg-primary px-3 py-2">Kolkata ⇄ Siliguri</span>
                <span class="badge bg-primary px-3 py-2">Kolkata ⇄ Digha</span>
                <span class="badge bg-primary px-3 py-2">Kolkata ⇄ Varanasi</span>
              @endif
            </div>
          </div>
          <div class="d-flex gap-3">
            <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="btn btn-warning fw-bold rounded-pill px-4 text-dark">
              <i class="fa-solid fa-phone me-1"></i> Call {{ \App\Models\Setting::get('phone_1', '9433053668') }}
            </a>
            <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number', '919433053668') }}?text={{ urlencode('I want to book an All India bus ticket') }}" target="_blank"
              class="btn btn-success fw-bold rounded-pill px-4">
              <i class="fa-brands fa-whatsapp me-1"></i> WhatsApp Booking
            </a>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="hero-banner-image-container">
            <img src="{{ asset($routeHighlight && $routeHighlight->image ? $routeHighlight->image : 'assets/images/banners/banner-routes.jpg') }}" alt="All India Bus Booking Ticket Available"
              class="img-fluid rounded-4 shadow">
          </div>
        </div>
      </div>

      <!-- BUS ROUTES TIMETABLE & ESTIMATE FARE TABLE -->
      <div class="section-title-wrap mt-5">
        <span class="section-badge">Schedule &amp; Rates</span>
        <h2 class="section-title">Popular Interstate &amp; Intra-State Bus Routes</h2>
        <p>Daily morning, evening, and overnight departures from Kolkata with boarding points across the city.</p>
        <div class="divider-line"></div>
      </div>

      <div class="table-responsive shadow-sm rounded-4 border mb-5">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-primary text-white">
            <tr>
              <th scope="col" class="py-3 ps-4">Destination</th>
              <th scope="col" class="py-3">Bus Type Available</th>
              <th scope="col" class="py-3">Boarding Point (Kolkata)</th>
              <th scope="col" class="py-3">Approx Duration</th>
              <th scope="col" class="py-3">Ticket Fare (Approx)</th>
              <th scope="col" class="py-3 text-center pe-4">Book Ticket</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="ps-4 fw-bold"><i class="fa-solid fa-bus text-primary me-2"></i> Kolkata ➔ Siliguri</td>
              <td>AC Sleeper / Multi-Axle Volvo</td>
              <td>Esplanade / Karunamoyee / Airport</td>
              <td>12 - 14 Hrs</td>
              <td>₹750 - ₹1,450</td>
              <td class="text-center pe-4">
                <button class="btn btn-sm btn-primary rounded-pill px-3 btn-book-vehicle"
                  data-vehicle="Kolkata to Siliguri Bus Ticket" data-service="Bus Booking" data-bs-toggle="modal"
                  data-bs-target="#quickBookingModal">Book</button>
              </td>
            </tr>
            <tr>
              <td class="ps-4 fw-bold"><i class="fa-solid fa-bus text-primary me-2"></i> Kolkata ➔ Digha / Mandarmani</td>
              <td>AC Pushback Seater / Deluxe</td>
              <td>Esplanade / Howrah / Garia</td>
              <td>4 - 5 Hrs</td>
              <td>₹250 - ₹450</td>
              <td class="text-center pe-4">
                <button class="btn btn-sm btn-primary rounded-pill px-3 btn-book-vehicle"
                  data-vehicle="Kolkata to Digha Bus Ticket" data-service="Bus Booking" data-bs-toggle="modal"
                  data-bs-target="#quickBookingModal">Book</button>
              </td>
            </tr>
            <tr>
              <td class="ps-4 fw-bold"><i class="fa-solid fa-bus text-primary me-2"></i> Kolkata ➔ Asansol / Durgapur</td>
              <td>Express AC Seater / Sleeper</td>
              <td>Esplanade / Dankuni</td>
              <td>4 - 5.5 Hrs</td>
              <td>₹350 - ₹650</td>
              <td class="text-center pe-4">
                <button class="btn btn-sm btn-primary rounded-pill px-3 btn-book-vehicle"
                  data-vehicle="Kolkata to Asansol Bus Ticket" data-service="Bus Booking" data-bs-toggle="modal"
                  data-bs-target="#quickBookingModal">Book</button>
              </td>
            </tr>
            <tr>
              <td class="ps-4 fw-bold"><i class="fa-solid fa-bus text-primary me-2"></i> Kolkata ➔ Varanasi (Kashi)</td>
              <td>AC Luxury Sleeper Coach</td>
              <td>Babughat / Esplanade</td>
              <td>14 - 16 Hrs</td>
              <td>₹1,100 - ₹1,800</td>
              <td class="text-center pe-4">
                <button class="btn btn-sm btn-primary rounded-pill px-3 btn-book-vehicle"
                  data-vehicle="Kolkata to Varanasi Bus Ticket" data-service="Bus Booking" data-bs-toggle="modal"
                  data-bs-target="#quickBookingModal">Book</button>
              </td>
            </tr>
            <tr>
              <td class="ps-4 fw-bold"><i class="fa-solid fa-bus text-primary me-2"></i> Kolkata ➔ Delhi / Mumbai</td>
              <td>Multi-Axle Super Luxury Sleeper</td>
              <td>Kolkata Central Terminal</td>
              <td>Direct Long Route</td>
              <td>On Request</td>
              <td class="text-center pe-4">
                <button class="btn btn-sm btn-primary rounded-pill px-3 btn-book-vehicle"
                  data-vehicle="Interstate Long Route Bus" data-service="Bus Booking" data-bs-toggle="modal"
                  data-bs-target="#quickBookingModal">Book</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- CTA STRIP -->
  <section class="container my-5">
    <div class="cta-banner">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h2>Need Group Bus Rental or Corporate Charter?</h2>
          <p>Book 20, 26, 33, 40, or 52 seater luxury buses for weddings, corporate tours, and picnics.</p>
          <div class="mt-3">
            <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="cta-contact-num">
              <i class="fa-solid fa-phone-volume"></i> {{ \App\Models\Setting::get('phone_1', '9433053668') }} / {{ \App\Models\Setting::get('phone_2', '9432430360') }}
            </a>
          </div>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number', '919433053668') }}?text={{ urlencode('Hello Debpriyan Travels, I want to charter a Luxury Bus for a Group Tour') }}"
            target="_blank" class="btn btn-warning btn-lg fw-bold px-4 py-3 rounded-pill text-dark shadow">
            <i class="fa-brands fa-whatsapp me-2"></i> Charter Bus on WhatsApp
          </a>
        </div>
      </div>
    </div>
  </section>

@endsection
