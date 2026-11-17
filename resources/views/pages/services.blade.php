@extends('layouts.app')

@section('title', 'Services | ' . \App\Models\Setting::get('site_name', 'Debpriyan Travels'))

@section('content')

  <!-- INNER HERO -->
  <div class="inner-page-hero">
    <div class="container">
      <h1>Debpriyan Travel Services</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Services</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- SERVICE DETAILS SECTION -->
  <section class="section-padding">
    <div class="container">

      @foreach($services as $index => $service)
      <div id="service-{{ $service->id }}" class="row align-items-center gy-4 mb-5 pb-5 border-bottom {{ $index % 2 !== 0 ? 'flex-lg-row-reverse' : '' }}">
        <div class="col-lg-6">
          <span class="section-badge">{{ $service->category ?: 'Fleet & Travel' }}</span>
          <h2 class="fw-bold mb-3">{{ $service->title }}</h2>
          @if($service->bengali_subtitle)
          <span class="bengali-tagline fs-5">{{ $service->bengali_subtitle }}</span>
          @endif
          <div class="text-muted mb-4">
            {!! nl2br(e($service->description)) !!}
          </div>
          <div class="d-flex flex-wrap gap-2">
            <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number', '919433053668') }}?text={{ urlencode($service->whatsapp_message ?: 'Hello Debpriyan Travels, I want to inquire about ' . $service->title) }}"
              target="_blank" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold">
              <i class="fa-brands fa-whatsapp me-1"></i> {{ $service->btn_text ?: 'Book Service' }}
            </a>
            <button class="btn btn-outline-primary rounded-pill px-4 py-2 fw-semibold btn-book-vehicle"
              data-vehicle="{{ $service->title }}" data-service="{{ $service->category }}" data-bs-toggle="modal" data-bs-target="#quickBookingModal">
              Quick Inquiry
            </button>
          </div>
        </div>
        <div class="col-lg-6">
          <img src="{{ asset($service->image ?: 'assets/images/banners/banner-routes.jpg') }}" alt="{{ $service->title }}"
            class="img-fluid rounded-4 shadow">
        </div>
      </div>
      @endforeach

    </div>
  </section>

  <!-- FAQ SECTION -->
  <section class="section-padding bg-light">
    <div class="container">
      <div class="section-title-wrap">
        <span class="section-badge">Got Questions?</span>
        <h2 class="section-title">Frequently Asked Questions (F.A.Q.)</h2>
        <p>Find answers to common questions regarding booking, fares, cancellation, and vehicle amenities.</p>
        <div class="divider-line"></div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-9">
          <div class="accordion" id="travelFAQ">

            <div class="accordion-item mb-3 border rounded-3 shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq1">
                  How can I book a bus ticket or hire a car with Debpriyan Travels?
                </button>
              </h2>
              <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#travelFAQ">
                <div class="accordion-body text-muted">
                  Booking is quick and simple! You can click the "Book on WhatsApp" button or call us directly on
                  <strong>{{ \App\Models\Setting::get('phone_1', '9433053668') }}</strong> or <strong>{{ \App\Models\Setting::get('phone_2', '9432430360') }}</strong>. Tell us your travel dates, route, and
                  preferred vehicle, and our team will provide instant confirmation with seat/vehicle details.
                </div>
              </div>
            </div>

            <div class="accordion-item mb-3 border rounded-3 shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq2">
                  Are toll taxes, parking fees, and driver allowances included?
                </button>
              </h2>
              <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#travelFAQ">
                <div class="accordion-body text-muted">
                  For tour packages and fixed outstation quotes, all state border permits, tolls, and driver allowances
                  can be bundled in an all-inclusive tariff. For per-km rentals, toll and parking are paid at actuals
                  with transparent receipts.
                </div>
              </div>
            </div>

            <div class="accordion-item mb-3 border rounded-3 shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq3">
                  What routes are available for All India Bus Booking?
                </button>
              </h2>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#travelFAQ">
                <div class="accordion-body text-muted">
                  We connect Kolkata to major routes nationwide, including Siliguri, Digha, Asansol, Durgapur, Varanasi,
                  Delhi, Mumbai, Chennai, Hyderabad, Puri, and Patna. Daily luxury seater and AC sleeper options are
                  available.
                </div>
              </div>
            </div>

            <div class="accordion-item mb-3 border rounded-3 shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq4">
                  What seater options do you have for Tempo Travellers?
                </button>
              </h2>
              <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#travelFAQ">
                <div class="accordion-body text-muted">
                  We operate 9 Seater, 12 Seater, 16 Seater, 20 Seater, and 26 Seater Tempo Travellers, as well as 33 to
                  52 seater luxury buses with pushback seats, dual AC, and music/LED entertainment systems.
                </div>
              </div>
            </div>

            <div class="accordion-item mb-3 border rounded-3 shadow-sm">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse"
                  data-bs-target="#faq5">
                  Do you provide services for government and corporate offices?
                </button>
              </h2>
              <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#travelFAQ">
                <div class="accordion-body text-muted">
                  Yes, Debpriyan Travels is a recognized vendor providing official transport support, VIP delegation
                  convoys, GST billing, and dedicated staff pick-and-drop fleets for government departments and
                  corporate clients across Kolkata.
                </div>
              </div>
            </div>

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
          <h2>Need Custom Service or Corporate Quotation?</h2>
          <p>Talk to our transport supervisor directly for instant customized rates.</p>
          <div class="mt-3">
            <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="cta-contact-num">
              <i class="fa-solid fa-phone-volume"></i> {{ \App\Models\Setting::get('phone_1', '9433053668') }} / {{ \App\Models\Setting::get('phone_2', '9432430360') }}
            </a>
          </div>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number', '919433053668') }}" target="_blank"
            class="btn btn-warning btn-lg fw-bold px-4 py-3 rounded-pill text-dark shadow">
            <i class="fa-brands fa-whatsapp me-2"></i> WhatsApp Booking
          </a>
        </div>
      </div>
    </div>
  </section>

@endsection
