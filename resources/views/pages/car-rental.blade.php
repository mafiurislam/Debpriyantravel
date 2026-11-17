@extends('layouts.app')

@section('title', 'Car Rental in Kolkata with Driver | ' . \App\Models\Setting::get('site_name', 'Debpriyan Travels'))

@section('content')

  <!-- INNER HERO -->
  <div class="inner-page-hero">
    <div class="container">
      <h1>Car Rental in Kolkata with Driver</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Car Rental</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- INTRO & TYPES OF CARS -->
  <section class="section-padding">
    <div class="container">
      <div class="section-title-wrap">
        <span class="section-badge">Premium Fleet</span>
        <h2 class="section-title">Types of Cars Available for Rent</h2>
        <p>From fuel-efficient sedans to commanding SUVs and zero-emission electric vehicles, enjoy Kolkata's smoothest ride.</p>
        <div class="divider-line"></div>
      </div>

      <div class="row g-4">
        @foreach($vehicles as $vehicle)
        <div class="col-lg-4 col-md-6">
          <div class="fleet-card">
            <div class="fleet-img-wrap">
              @if($vehicle->capacity)
              <span class="fleet-badge">{{ $vehicle->capacity }}</span>
              @endif
              <img src="{{ asset($vehicle->image ?: 'assets/images/sedan.jpg') }}" alt="{{ $vehicle->name }}">
            </div>
            <div class="fleet-body">
              <h3>{{ $vehicle->name }}</h3>
              @if($vehicle->rate_hourly || $vehicle->rate_km)
              <div class="mb-2 text-primary fw-bold small">
                @if($vehicle->rate_hourly)<span class="me-2"><i class="fa-solid fa-clock"></i> {{ $vehicle->rate_hourly }}</span>@endif
                @if($vehicle->rate_km)<span><i class="fa-solid fa-road"></i> {{ $vehicle->rate_km }}</span>@endif
              </div>
              @endif
              @if($vehicle->features)
              <ul class="fleet-features-list">
                @foreach(explode(',', $vehicle->features) as $feat)
                  @if(trim($feat))
                  <li><i class="fa-solid fa-circle-check text-success"></i> {{ trim($feat) }}</li>
                  @endif
                @endforeach
              </ul>
              @endif
              <div class="fleet-footer">
                <button class="btn-fleet-book btn-book-vehicle" data-vehicle="{{ $vehicle->name }}"
                  data-service="{{ $vehicle->category }}" data-bs-toggle="modal" data-bs-target="#quickBookingModal">
                  Book {{ $vehicle->name }}
                </button>
                <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="btn-fleet-call"><i class="fa-solid fa-phone"></i></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- POPULAR RENTAL PACKAGES -->
  <section class="section-padding bg-light">
    <div class="container">
      <div class="section-title-wrap">
        <span class="section-badge">Fixed Rate Convenience</span>
        <h2 class="section-title">Top Car Rental Packages in Kolkata</h2>
        <p>Transparent all-inclusive packages with zero hidden fees and guaranteed on-time driver arrival.</p>
        <div class="divider-line"></div>
      </div>

      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="tour-card">
            <div class="tour-card-img">
              <img src="{{ asset('assets/images/pkg-airport.jpg') }}" alt="Airport Pickup and Drop Kolkata">
              <span class="tour-duration-badge">Fixed Fare</span>
            </div>
            <div class="tour-card-body">
              <div>
                <h4>Airport Pickup / Drop</h4>
                <p>24x7 service to &amp; from NSCBI Airport (Dum Dum). Driver assists with bags and tracks flight delays in real-time.</p>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">Dzire: ₹899 | Innova: ₹1599</span>
                <button class="btn btn-sm btn-outline-primary rounded-pill btn-book-vehicle"
                  data-vehicle="Airport Transfer" data-service="Car Rental" data-bs-toggle="modal"
                  data-bs-target="#quickBookingModal">Book Now</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="tour-card">
            <div class="tour-card-img">
              <img src="{{ asset('assets/images/pkg-citytour.jpg') }}" alt="Kolkata Local City Tour 8hr 80km">
              <span class="tour-duration-badge">8 Hrs / 80 Km</span>
            </div>
            <div class="tour-card-body">
              <div>
                <h4>Kolkata Local City Tour</h4>
                <p>Visit Victoria Memorial, Dakshineswar, Kalighat, Science City, Park Street, and Prinsep Ghat comfortably.</p>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">Dzire: ₹1899 | Innova: ₹2799</span>
                <button class="btn btn-sm btn-outline-primary rounded-pill btn-book-vehicle"
                  data-vehicle="Kolkata City Tour" data-service="Car Rental" data-bs-toggle="modal"
                  data-bs-target="#quickBookingModal">Book Now</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="tour-card">
            <div class="tour-card-img">
              <img src="{{ asset('assets/images/tempo-large.jpg') }}" alt="Railway Station Pickup Drop Howrah Sealdah">
              <span class="tour-duration-badge">Punctual</span>
            </div>
            <div class="tour-card-body">
              <div>
                <h4>Railway Station Pickup / Drop</h4>
                <p>Direct door-to-door transfer from Howrah Junction, Sealdah Station, Kolkata (Chitpur), or Shalimar.</p>
              </div>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">Starting from ₹699</span>
                <button class="btn btn-sm btn-outline-primary rounded-pill btn-book-vehicle"
                  data-vehicle="Station Transfer" data-service="Car Rental" data-bs-toggle="modal"
                  data-bs-target="#quickBookingModal">Book Now</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ESTIMATED PRICE TABLE -->
  <section class="section-padding">
    <div class="container">
      <div class="section-title-wrap">
        <span class="section-badge">Transparent Pricing</span>
        <h2 class="section-title">Car Rental in Kolkata with Driver Rate Chart</h2>
        <p>No unexpected surcharges. Straightforward per-day and per-kilometer rates for city and outstation journeys.</p>
        <div class="divider-line"></div>
      </div>

      <div class="table-responsive shadow-sm rounded-4 border">
        <table class="table table-hover align-middle mb-0">
          <thead class="table-primary text-white">
            <tr>
              <th scope="col" class="py-3 ps-4">Vehicle Type</th>
              <th scope="col" class="py-3">Seating Capacity</th>
              <th scope="col" class="py-3">Local (8 Hr / 80 Km)</th>
              <th scope="col" class="py-3">Outstation Rate / Km</th>
              <th scope="col" class="py-3">Driver Allowance</th>
              <th scope="col" class="py-3 text-center pe-4">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="ps-4 fw-bold"><i class="fa-solid fa-car text-primary me-2"></i> Maruti Swift Dzire (Sedan)</td>
              <td>4 + 1 Persons</td>
              <td>₹1,800 - ₹2,000</td>
              <td>₹15 / Km (or ₹150 / hr)</td>
              <td>₹300 / Day</td>
              <td class="text-center pe-4">
                <button class="btn btn-sm btn-primary rounded-pill px-3 btn-book-vehicle" data-vehicle="Swift Dzire"
                  data-service="Car Rental" data-bs-toggle="modal" data-bs-target="#quickBookingModal">Book</button>
              </td>
            </tr>
            <tr>
              <td class="ps-4 fw-bold"><i class="fa-solid fa-car-side text-primary me-2"></i> Toyota Innova Crysta</td>
              <td>6/7 + 1 Persons</td>
              <td>₹2,800 - ₹3,200</td>
              <td>₹18 - ₹22 / Km</td>
              <td>₹400 / Day</td>
              <td class="text-center pe-4">
                <button class="btn btn-sm btn-primary rounded-pill px-3 btn-book-vehicle" data-vehicle="Innova Crysta"
                  data-service="Car Rental" data-bs-toggle="modal" data-bs-target="#quickBookingModal">Book</button>
              </td>
            </tr>
            <tr>
              <td class="ps-4 fw-bold"><i class="fa-solid fa-van-shuttle text-primary me-2"></i> Force Tempo Traveller</td>
              <td>9 - 26 Persons</td>
              <td>Package Quote</td>
              <td>₹28 - ₹35 / Km</td>
              <td>₹500 / Day</td>
              <td class="text-center pe-4">
                <button class="btn btn-sm btn-primary rounded-pill px-3 btn-book-vehicle" data-vehicle="Tempo Traveller"
                  data-service="Tempo Traveller" data-bs-toggle="modal" data-bs-target="#quickBookingModal">Book</button>
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
          <h2>Book Your Car in Kolkata in Under 2 Minutes!</h2>
          <p>Instant booking confirmation on WhatsApp with vehicle and driver details.</p>
          <div class="mt-3">
            <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="cta-contact-num">
              <i class="fa-solid fa-phone-volume"></i> {{ \App\Models\Setting::get('phone_1', '9433053668') }} / {{ \App\Models\Setting::get('phone_2', '9432430360') }}
            </a>
          </div>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number', '919433053668') }}?text={{ urlencode('Hello Debpriyan Travels, I want to book a Cab in Kolkata') }}"
            target="_blank" class="btn btn-warning btn-lg fw-bold px-4 py-3 rounded-pill text-dark shadow">
            <i class="fa-brands fa-whatsapp me-2"></i> Book on WhatsApp
          </a>
        </div>
      </div>
    </div>
  </section>

@endsection
