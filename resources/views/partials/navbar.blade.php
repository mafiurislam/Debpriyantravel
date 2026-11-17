<!-- ================= MAIN NAVBAR ================= -->
<nav class="navbar navbar-expand-lg main-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('assets/images/logo.png') }}" alt="{{ \App\Models\Setting::get('site_name', 'Debpriyan Travels') }}" class="site-logo">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
      aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('bus-booking') ? 'active' : '' }}" href="{{ route('bus-booking') }}">Bus Booking</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('car-rental') ? 'active' : '' }}" href="{{ route('car-rental') }}">Car Rental</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('packages') ? 'active' : '' }}" href="{{ route('packages') }}">Tour Packages</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
      </ul>

      <div class="d-flex align-items-center gap-2">
        <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="btn-header-call">
          <i class="fa-solid fa-phone"></i> <span>{{ \App\Models\Setting::get('phone_1', '9433053668') }}</span>
        </a>
        <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number', '919433053668') }}?text={{ urlencode('Hello Debpriyan Travels, I want to inquire about booking') }}"
          target="_blank" class="btn-header-wa">
          <i class="fa-brands fa-whatsapp"></i> <span>WhatsApp</span>
        </a>
      </div>
    </div>
  </div>
</nav>
