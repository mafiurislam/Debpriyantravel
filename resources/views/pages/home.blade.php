@extends('layouts.app')

@section('title', \App\Models\Setting::get('site_name', 'Debpriyan Travels') . ' | Your Journey, Our Responsibility | Kolkata')

@section('content')

  <!-- ================= HERO SLIDER SECTION ================= -->
  <section class="hero-slider-section position-relative">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4500">
      <!-- Carousel Indicators -->
      <div class="carousel-indicators">
        @foreach($sliders as $index => $slider)
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"
          aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
      </div>

      <!-- Carousel Slides -->
      <div class="carousel-inner">
        @foreach($sliders as $index => $slider)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
          <div class="hero-slide-bg" style="background-image: url('{{ asset($slider->image) }}');"></div>
        </div>
        @endforeach
      </div>

      <!-- Carousel Navigation Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- Centered Fixed Overlay Content -->
    <div class="hero-content-overlay">
      <div class="container text-center">
        <p class="hero-sujata-sub">Hire Tempo Traveller Rent in Kolkata</p>
        <h1 class="hero-sujata-title">Tempo traveller kolkata</h1>
        <p class="hero-sujata-desc">
          Hire best tempo traveller in Kolkata. Call Now - <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="text-white fw-bold">+91 {{ \App\Models\Setting::get('phone_1', '9433053668') }}</a>
        </p>
        <div class="hero-sujata-buttons d-flex justify-content-center align-items-center gap-3">
          <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="btn btn-sujata-call">CALL NOW</a>
          <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number', '919433053668') }}?text={{ urlencode('Hello Debpriyan Travels, I want to hire Tempo Traveller in Kolkata') }}"
            target="_blank" class="btn btn-sujata-wa">WHATSAPP</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= ALL INDIA ROUTE HIGHLIGHT ================= -->
  @if($routeHighlight)
  <section class="container my-4 my-md-5">
    <div class="routes-banner-section p-4 p-md-5">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <span class="routes-badge"><i class="fa-solid fa-route me-1"></i> {{ $routeHighlight->badge }}</span>
          <h2 class="text-white fw-bold mb-3">{{ $routeHighlight->title }}</h2>
          <p class="text-light mb-4">
            {{ $routeHighlight->description }}
          </p>

          <div class="d-flex flex-wrap mb-4">
            @php
              $routeList = array_map('trim', explode(',', $routeHighlight->routes));
            @endphp
            @foreach($routeList as $city)
              @if(!empty($city))
              <span class="route-pill-tag"><i class="fa-solid fa-location-arrow"></i> {{ $city }}</span>
              @endif
            @endforeach
          </div>

          <div class="bg-dark bg-opacity-50 p-3 rounded-3 d-inline-block border border-light border-opacity-25">
            <span class="text-warning fw-bold fs-6">
              <i class="fa-solid fa-shield-heart me-1"></i> {{ $routeHighlight->bengali_tagline }}
            </span>
          </div>
        </div>

        <div class="col-lg-5 text-center mt-4 mt-lg-0">
          <img src="{{ asset($routeHighlight->image) }}" alt="All India Bus Booking Debpriyan Travel"
            class="img-fluid rounded-4 shadow border border-2 border-white">
        </div>
      </div>
    </div>
  </section>
  @endif

  <!-- ================= CORE SERVICES ================= -->
  <section class="section-padding bg-light">
    <div class="container">
      <div class="section-title-wrap">
        <span class="section-badge">Our Comprehensive Solutions</span>
        <h2 class="section-title">Debpriyan Transport &amp; Rental Services</h2>
        <p>Complete travel, bus ticketing, and fleet rental solutions customized for individuals, corporations, and government delegations.</p>
        <div class="divider-line"></div>
      </div>

      <div class="row g-4 justify-content-center">
        @foreach($services as $service)
        <div class="col-lg-4 col-md-6">
          <div class="service-feature-card">
            <div class="service-card-header">
              <i class="{{ $service->icon ?: 'fa-solid fa-car' }}"></i>
              <h5>{{ $service->title }}</h5>
            </div>
            @if($service->image)
            <div class="service-card-img-wrap">
              <img src="{{ asset($service->image) }}" alt="{{ $service->title }}">
            </div>
            @endif
            <div class="service-card-body">
              @if($service->bengali_subtitle)
              <span class="service-bengali-subtitle">{{ $service->bengali_subtitle }}</span>
              @endif
              <div class="service-card-desc mb-3">
                {!! nl2br(e($service->description)) !!}
              </div>
              <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number', '919433053668') }}?text={{ urlencode($service->whatsapp_message ?: 'Hello Debpriyan Travels, I want to inquire about ' . $service->title) }}"
                target="_blank" class="btn btn-card-book">
                <i class="fa-brands fa-whatsapp"></i> {{ $service->btn_text ?: 'Book Service' }}
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ================= 4 CATEGORY CARDS ================= -->
  <section class="section-padding">
    <div class="container">
      <div class="row align-items-center mb-4">
        <div class="col-md-8">
          <span class="section-badge">Core Travel Categories</span>
          <h2 class="section-title mb-1">Debpriyan Travels Specializations</h2>
          <p class="text-muted">Your Journey, Our Responsibility. Seamless connectivity across West Bengal and India.</p>
        </div>
        <div class="col-md-4 text-md-end">
          <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="btn btn-primary fw-bold rounded-pill px-4">
            <i class="fa-solid fa-phone me-1"></i> Quick Help: {{ \App\Models\Setting::get('phone_1', '9433053668') }}
          </a>
        </div>
      </div>

      <div class="row g-4">
        @foreach($specializations as $spec)
        <div class="col-lg-4 col-md-6">
          <div class="category-card">
            <img src="{{ asset($spec->image) }}" alt="{{ $spec->title }}">
            <h4>{{ $spec->title }}</h4>
            @if($spec->bengali_subtitle)
            <span class="bengali">{{ $spec->bengali_subtitle }}</span>
            @endif
            <div class="mt-3">
              <a href="{{ Str::startsWith($spec->btn_link, 'http') ? $spec->btn_link : url($spec->btn_link) }}" class="btn btn-sm btn-outline-primary rounded-pill w-100">
                {{ $spec->btn_text ?: 'Explore' }}
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ================= FLEET SHOWCASE ================= -->
  <section class="section-padding bg-light">
    <div class="container">
      <div class="section-title-wrap">
        <span class="section-badge">Our Modern Fleet</span>
        <h2 class="section-title">Vehicles for Rent &amp; Hire in Kolkata</h2>
        <p>Choose from our comprehensive range of luxury Tempo Travellers, premium Sedans, SUVs, EVs, and full-size buses.</p>
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
                  <i class="fa-solid fa-calendar-check"></i> Book Now
                </button>
                <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="btn-fleet-call" title="Call to book">
                  <i class="fa-solid fa-phone"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ================= CUSTOMER VIDEO REVIEWS ================= -->
  @if($videoReviews->count() > 0)
  <section class="video-reviews-section">
    <div class="container">
      <h2 class="video-section-title">Tempo Traveller Kolkata - Debpriyan Travels Review</h2>
      <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 g-3">
        @foreach($videoReviews as $vid)
        <div class="col">
          <div class="video-thumb-card" data-video-url="https://www.youtube.com/embed/{{ $vid->youtube_id }}?autoplay=1"
            title="{{ $vid->title }}">
            <img src="{{ asset($vid->thumbnail ?: 'assets/images/video-thumb-1.webp') }}" alt="{{ $vid->title }}">
            <div class="video-thumb-overlay">
              <div class="video-play-btn"><i class="fa-solid fa-play"></i></div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  <!-- ================= BIG CTA CALL TO ACTION ================= -->
  <section class="container mb-5">
    <div class="cta-banner">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h2>Book Your Ticket / Vehicle Today with Debpriyan!</h2>
          <p>Instant booking for Bus Tickets, Car Rental, Tempo Traveller &amp; Official Fleet. Best price guaranteed.</p>
          <div class="mt-3">
            <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="cta-contact-num">
              <i class="fa-solid fa-phone-volume"></i> {{ \App\Models\Setting::get('phone_1', '9433053668') }} / {{ \App\Models\Setting::get('phone_2', '9432430360') }}
            </a>
          </div>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number', '919433053668') }}?text={{ urlencode('I want to book a ticket or vehicle today') }}"
            target="_blank" class="btn btn-warning btn-lg fw-bold px-4 py-3 rounded-pill text-dark shadow">
            <i class="fa-brands fa-whatsapp me-2"></i> Get In Touch
          </a>
        </div>
      </div>
    </div>
  </section>

@endsection
