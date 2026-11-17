<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Debpriyan Travels | Your Journey, Our Responsibility | Kolkata')</title>
  <meta name="description"
    content="@yield('meta_description', \App\Models\Setting::get('meta_description', 'Debpriyan Travels & Transport Solution in Kolkata. Bus ticket booking across India, car rental (Innova, Dzire, EV), tempo traveller hire, corporate & govt travel support. Call 9433053668.'))">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Bootstrap 5.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  @yield('styles')
</head>

<body>

  @include('partials.navbar')

  @if(session('success'))
  <div class="container mt-3">
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
      <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif

  @yield('content')

  @include('partials.footer')

  <!-- ================= FLOATING ACTION BUTTONS (CALL & WHATSAPP) ================= -->
  <div class="floating-actions">
    <a href="https://wa.me/{{ \App\Models\Setting::get('whatsapp_number', '919433053668') }}?text={{ urlencode('Hello Debpriyan Travels, I would like to book a ticket or vehicle') }}"
      target="_blank" class="floating-btn wa" title="WhatsApp Chat">
      <i class="fa-brands fa-whatsapp"></i>
      <span class="tooltip-text">Chat on WhatsApp</span>
    </a>
    <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="floating-btn call" title="Call Us Now">
      <i class="fa-solid fa-phone"></i>
      <span class="tooltip-text">Call {{ \App\Models\Setting::get('phone_1', '9433053668') }}</span>
    </a>
    <a href="#" id="backToTop" class="floating-btn top" title="Back to top">
      <i class="fa-solid fa-chevron-up"></i>
    </a>
  </div>

  @include('partials.modals')

  <!-- jQuery & Bootstrap 5.3 JS -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JS -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  @yield('scripts')
</body>

</html>
