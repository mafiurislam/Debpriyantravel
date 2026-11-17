@extends('layouts.app')

@section('title', 'Tour Packages | ' . \App\Models\Setting::get('site_name', 'Debpriyan Travels'))

@section('content')

  <!-- INNER HERO -->
  <div class="inner-page-hero">
    <div class="container">
      <h1>Customized Holiday &amp; Weekend Tour Packages</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tour Packages</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- PACKAGES GRID -->
  <section class="section-padding">
    <div class="container">
      <div class="section-title-wrap">
        <span class="section-badge">Handcrafted Itineraries</span>
        <h2 class="section-title">Popular Tour Packages from Kolkata</h2>
        <span class="bengali-tagline fs-5">ভ্রমণ প্যাকেজ (সহজ বুকিং, নিশ্চিন্ত যাত্রা)</span>
        <p>Doorstep pickup in Kolkata with dedicated AC car or Tempo Traveller, fuel, tolls, and expert driver included.</p>
        <div class="divider-line"></div>
      </div>

      <div class="row g-4">
        @foreach($packages as $pkg)
        <div class="col-lg-4 col-md-6">
          <div class="tour-card">
            <div class="tour-card-img">
              <img src="{{ asset($pkg->image ?: 'assets/images/pkg-digha.jpg') }}" alt="{{ $pkg->name }}">
              @if($pkg->duration)
              <span class="tour-duration-badge"><i class="fa-regular fa-clock me-1"></i> {{ $pkg->duration }}</span>
              @endif
            </div>
            <div class="tour-card-body">
              <div>
                <h4>{{ $pkg->name }}</h4>
                @if($pkg->bengali_name)
                <small class="text-primary fw-bold d-block mb-2">{{ $pkg->bengali_name }}</small>
                @endif
                <p>{{ $pkg->description }}</p>
                @if($pkg->highlights)
                <ul class="list-unstyled small text-muted mb-3">
                  @foreach(explode(',', $pkg->highlights) as $hl)
                    @if(trim($hl))
                    <li><i class="fa-solid fa-check text-primary me-1"></i> {{ trim($hl) }}</li>
                    @endif
                  @endforeach
                </ul>
                @endif
              </div>
              <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                <span class="fw-bold text-primary">{{ $pkg->price ?: 'Contact for Rate' }}</span>
                <button class="btn btn-sm btn-primary rounded-pill btn-book-vehicle" data-vehicle="{{ $pkg->name }}" data-service="Tour Package" data-bs-toggle="modal" data-bs-target="#quickBookingModal">Book Now</button>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- CTA STRIP -->
  <section class="container my-5">
    <div class="cta-banner">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h2>Looking for a Customized Tour Itinerary?</h2>
          <p>We organize tailored family tours, school excursions, and pilgrimage trips across India.</p>
          <div class="mt-3">
            <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="cta-contact-num">
              <i class="fa-solid fa-phone-volume"></i> {{ \App\Models\Setting::get('phone_1', '9433053668') }} / {{ \App\Models\Setting::get('phone_2', '9432430360') }}
            </a>
          </div>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number', '919433053668') }}?text={{ urlencode('Hello Debpriyan Travels, I want to inquire about customized Tour Packages') }}"
            target="_blank" class="btn btn-warning btn-lg fw-bold px-4 py-3 rounded-pill text-dark shadow">
            <i class="fa-brands fa-whatsapp me-2"></i> Plan On WhatsApp
          </a>
        </div>
      </div>
    </div>
  </section>

@endsection
