@extends('layouts.app')

@section('title', 'Contact Us | ' . \App\Models\Setting::get('site_name', 'Debpriyan Travels'))

@section('content')

  <!-- INNER HERO -->
  <div class="inner-page-hero">
    <div class="container">
      <h1>Contact Debpriyan Travels</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- CONTACT DETAILS & FORM -->
  <section class="section-padding">
    <div class="container">
      <div class="row g-5">

        <!-- CONTACT INFORMATION CARDS -->
        <div class="col-lg-5">
          <span class="section-badge">Get In Touch</span>
          <h2 class="fw-bold mb-3">We Are Here To Assist 24x7</h2>
          <span class="bengali-tagline fs-5 mb-4">আপনার যাত্রা, আমাদের দায়িত্ব</span>
          <p class="text-muted">
            Have questions about All India bus tickets, booking a luxury Tempo Traveller, hiring an Innova / Swift
            Dzire, or organizing corporate transport? Call our dispatch office directly or chat on WhatsApp for
            immediate response.
          </p>

          <div class="d-flex align-items-start gap-3 p-3 bg-light rounded-4 border mb-3">
            <div class="value-prop-icon bg-primary text-white">
              <i class="fa-solid fa-phone"></i>
            </div>
            <div>
              <h6 class="fw-bold mb-1">Direct Phone Lines</h6>
              <p class="mb-0"><a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="text-primary fw-bold fs-5">{{ \App\Models\Setting::get('phone_1', '9433053668') }}</a></p>
              <p class="mb-0"><a href="tel:{{ \App\Models\Setting::get('phone_2', '9432430360') }}" class="text-primary fw-bold fs-5">{{ \App\Models\Setting::get('phone_2', '9432430360') }}</a></p>
              <small class="text-muted">Available 24 hours / 7 days a week</small>
            </div>
          </div>

          <div class="d-flex align-items-start gap-3 p-3 bg-light rounded-4 border mb-3">
            <div class="value-prop-icon bg-success text-white">
              <i class="fa-brands fa-whatsapp"></i>
            </div>
            <div>
              <h6 class="fw-bold mb-1">Official WhatsApp Desk</h6>
              <p class="mb-0"><a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number', '919433053668') }}" target="_blank" class="text-success fw-bold fs-5">+{{ \App\Models\Setting::get('whatsapp_number', '919433053668') }}</a></p>
              <small class="text-muted">Instant quotes, vehicle photos &amp; confirmed e-tickets</small>
            </div>
          </div>

          <div class="d-flex align-items-start gap-3 p-3 bg-light rounded-4 border mb-3">
            <div class="value-prop-icon bg-danger text-white">
              <i class="fa-solid fa-envelope"></i>
            </div>
            <div>
              <h6 class="fw-bold mb-1">Email Address</h6>
              <p class="mb-0"><a href="mailto:{{ \App\Models\Setting::get('email', 'debpriyan2021@gmail.com') }}" class="text-dark fw-bold">{{ \App\Models\Setting::get('email', 'debpriyan2021@gmail.com') }}</a></p>
              <small class="text-muted">For corporate tenders &amp; official queries</small>
            </div>
          </div>

          <div class="d-flex align-items-start gap-3 p-3 bg-light rounded-4 border">
            <div class="value-prop-icon bg-warning text-dark">
              <i class="fa-solid fa-location-dot"></i>
            </div>
            <div>
              <h6 class="fw-bold mb-1">Head Office Location</h6>
              <p class="mb-0 text-dark fw-semibold">{{ \App\Models\Setting::get('address', 'Kolkata - 700161, West Bengal, India') }}</p>
              <small class="text-muted">Open 24 Hours / 7 Days</small>
            </div>
          </div>
        </div>

        <!-- CONTACT INQUIRY FORM -->
        <div class="col-lg-7">
          <div class="p-4 p-md-5 bg-white rounded-4 border shadow-sm">
            <h3 class="fw-bold mb-2">Send Us an Inquiry</h3>
            <p class="text-muted mb-4">Fill out the details below and we will connect with you right away.</p>

            <form action="{{ route('inquiry.store') }}" method="POST" id="contactInquiryForm">
              @csrf
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Your Name *</label>
                  <input type="text" name="name" class="form-control" id="contactName" placeholder="Enter your full name" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Phone Number *</label>
                  <input type="tel" name="phone" class="form-control" id="contactPhone" placeholder="Enter 10-digit number" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Email Address (Optional)</label>
                  <input type="email" name="email" class="form-control" id="contactEmail" placeholder="name@example.com">
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Service Needed *</label>
                  <select name="service_type" class="form-select" id="contactSubject" required>
                    <option value="All India Bus Ticket Booking">All India Bus Ticket Booking</option>
                    <option value="Car Rental (Innova / Dzire / EV)">Car Rental (Innova / Dzire / EV)</option>
                    <option value="Tempo Traveller Hire">Tempo Traveller Hire (9-26 Seater)</option>
                    <option value="Govt Office Official Travel">Govt Office Official Travel</option>
                    <option value="Corporate Fleet Service">Corporate Fleet Service</option>
                    <option value="Daily or Monthly Gari Vara">Daily or Monthly Gari Vara</option>
                    <option value="Holiday Tour Package">Holiday Tour Package</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label fw-semibold">Your Requirements / Trip Details *</label>
                  <textarea name="message" class="form-control" id="contactMessage" rows="4"
                    placeholder="Mention dates, pickup & drop locations, passenger count, or specific vehicle requests..."
                    required></textarea>
                </div>
                <div class="col-12">
                  <button type="submit"
                    class="btn btn-warning btn-lg fw-bold px-4 py-3 rounded-pill w-100 text-dark shadow">
                    <i class="fa-brands fa-whatsapp me-2"></i> Submit &amp; Chat on WhatsApp
                  </button>
                  <div class="text-center mt-2">
                    <small class="text-muted"><i class="fa-solid fa-lock"></i> Your information is secure. No spam guaranteed.</small>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection
