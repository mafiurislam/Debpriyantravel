@extends('layouts.app')

@section('title', 'About Us | ' . \App\Models\Setting::get('site_name', 'Debpriyan Travels'))

@section('content')

  <!-- INNER PAGE HERO -->
  <div class="inner-page-hero">
    <div class="container">
      <h1>About Debpriyan Travels</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- ABOUT COMPANY OVERVIEW -->
  <section class="section-padding">
    <div class="container">
      <div class="row align-items-center gy-4">
        <div class="col-lg-6">
          <span class="section-badge">Company Profile</span>
          <h2 class="section-title">Your Journey, Our Responsibility</h2>
          <span class="bengali-tagline fs-5">আপনার যাত্রা, আমাদের দায়িত্ব</span>
          <p class="text-muted">
            <strong>Debpriyan Travels (Debpriyan Transport Solution &amp; Autoparts Solution)</strong> is one of
            Kolkata's premier integrated passenger transit and fleet hire organizations. Based in Kolkata-700161, we
            specialize in providing seamless All-India bus booking services, luxury tempo traveller hire, car rentals
            (Sedan, SUV, EV), corporate employee transportation, and official government department protocol transit.
          </p>
          <p class="text-muted">
            From single-day airport transfers to customized multi-day outstation holiday packages across Digha,
            Mandarmani, Sundarbans, Siliguri, and Darjeeling, Debpriyan Travels guarantees modern, sanitized,
            GPS-enabled vehicles piloted by polite and experienced chauffeurs.
          </p>

          <div class="row g-3 mt-2">
            <div class="col-sm-6">
              <div class="p-3 bg-light rounded-3 border">
                <h5 class="fw-bold text-primary mb-1"><i class="fa-solid fa-bus me-2 text-warning"></i> 50+ Modern Fleet</h5>
                <small class="text-muted">Tempo Travellers, Buses, Sedans &amp; SUVs</small>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="p-3 bg-light rounded-3 border">
                <h5 class="fw-bold text-primary mb-1"><i class="fa-solid fa-route me-2 text-warning"></i> 100+ Routes</h5>
                <small class="text-muted">Connecting West Bengal &amp; Across India</small>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="hero-banner-image-container">
            <img src="{{ asset('assets/images/banners/banner-main.jpg') }}" alt="Debpriyan Travels Team and Fleet" class="img-fluid rounded-4 shadow">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MISSION, VISION, VALUES -->
  <section class="section-padding bg-light">
    <div class="container">
      <div class="section-title-wrap">
        <span class="section-badge">Our Core Principles</span>
        <h2 class="section-title">Mission, Vision &amp; Values</h2>
        <p>The driving force behind every trip we facilitate across the state and nationwide.</p>
        <div class="divider-line"></div>
      </div>

      <div class="row g-4">
        <div class="col-lg-4">
          <div class="feature-box">
            <div class="feature-icon-circle">
              <i class="fa-solid fa-bullseye"></i>
            </div>
            <h4>Our Mission</h4>
            <p class="text-muted">
              To deliver safe, reliable, and affordable mobility solutions across India, ensuring punctuality, customer
              satisfaction, and peace of mind with our state-of-the-art vehicle fleet and responsive 24x7 customer support.
            </p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="feature-box">
            <div class="feature-icon-circle">
              <i class="fa-solid fa-eye"></i>
            </div>
            <h4>Our Vision</h4>
            <p class="text-muted">
              To be the most trusted, green, and technologically advanced transport partner in Eastern India, bridging
              routes from Kolkata to every corner of India through innovation, EV transition, and exemplary hospitality.
            </p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="feature-box">
            <div class="feature-icon-circle">
              <i class="fa-solid fa-gem"></i>
            </div>
            <h4>Our Values</h4>
            <p class="text-muted">
              Integrity, passenger safety, transparent pricing without hidden surcharges, respectful professionalism,
              and eco-friendly sustainable commuting for future generations.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA STRIP -->
  <section class="container my-5">
    <div class="cta-banner">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h2>Ready to Plan Your Next Journey?</h2>
          <p>Get in touch with Debpriyan Travels today for the lowest quotes and instant reservation.</p>
          <div class="mt-3">
            <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="cta-contact-num">
              <i class="fa-solid fa-phone-volume"></i> {{ \App\Models\Setting::get('phone_1', '9433053668') }} / {{ \App\Models\Setting::get('phone_2', '9432430360') }}
            </a>
          </div>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number', '919433053668') }}?text={{ urlencode('Hello Debpriyan Travels, I would like to inquire about your services') }}"
            target="_blank" class="btn btn-warning btn-lg fw-bold px-4 py-3 rounded-pill text-dark shadow">
            <i class="fa-brands fa-whatsapp me-2"></i> WhatsApp Dispatch
          </a>
        </div>
      </div>
    </div>
  </section>

@endsection
