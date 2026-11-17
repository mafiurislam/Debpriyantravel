<!-- ================= FOOTER ================= -->
<footer class="main-footer">
  <div class="container">
    <div class="row g-4">
      <!-- Col 1: Brand -->
      <div class="col-lg-4 col-md-6">
        <div class="footer-brand">
          <a href="{{ route('home') }}">
            <img src="{{ asset('assets/images/logo.png') }}" alt="{{ \App\Models\Setting::get('site_name', 'Debpriyan Travels') }}" class="footer-logo-img">
          </a>
          <p>
            {{ \App\Models\Setting::get('site_tagline', 'Your Journey, Our Responsibility') }}. (আপনার যাত্রা, আমাদের দায়িত্ব). Reliable bus ticket booking across
            India, luxury car rentals, and deluxe tempo traveller hire based in Kolkata.
          </p>
          <div class="text-warning fw-bold small mt-3">
            <i class="fa-solid fa-award me-1"></i> {{ \App\Models\Setting::get('bengali_tagline', 'সহজ বুকিং, নিশ্চিন্ত যাত্রা, সেরা পরিষেবা') }}
          </div>
        </div>
      </div>

      <!-- Col 2: Quick Links -->
      <div class="col-lg-2 col-md-6">
        <h5 class="footer-heading">Quick Links</h5>
        <ul class="footer-links">
          <li><a href="{{ route('home') }}"><i class="fa-solid fa-angle-right"></i> Home</a></li>
          <li><a href="{{ route('about') }}"><i class="fa-solid fa-angle-right"></i> About Us</a></li>
          <li><a href="{{ route('services') }}"><i class="fa-solid fa-angle-right"></i> Services</a></li>
          <li><a href="{{ route('bus-booking') }}"><i class="fa-solid fa-angle-right"></i> Bus Booking</a></li>
          <li><a href="{{ route('car-rental') }}"><i class="fa-solid fa-angle-right"></i> Car Rental</a></li>
          <li><a href="{{ route('packages') }}"><i class="fa-solid fa-angle-right"></i> Tour Packages</a></li>
          <li><a href="{{ route('contact') }}"><i class="fa-solid fa-angle-right"></i> Contact Us</a></li>
        </ul>
      </div>

      <!-- Col 3: Fleet & Services -->
      <div class="col-lg-3 col-md-6">
        <h5 class="footer-heading">Our Fleet &amp; Services</h5>
        <ul class="footer-links">
          <li><a href="{{ route('bus-booking') }}"><i class="fa-solid fa-angle-right"></i> 9, 12, 16 Seater Tempo</a></li>
          <li><a href="{{ route('bus-booking') }}"><i class="fa-solid fa-angle-right"></i> 20 &amp; 26 Seater Tempo</a></li>
          <li><a href="{{ route('bus-booking') }}"><i class="fa-solid fa-angle-right"></i> 33 &amp; 52 Seater Luxury Bus</a></li>
          <li><a href="{{ route('car-rental') }}"><i class="fa-solid fa-angle-right"></i> Toyota Innova Crysta</a></li>
          <li><a href="{{ route('car-rental') }}"><i class="fa-solid fa-angle-right"></i> Maruti Swift Dzire</a></li>
          <li><a href="{{ route('services') }}"><i class="fa-solid fa-angle-right"></i> Corporate &amp; Govt Travel</a></li>
          <li><a href="{{ route('admin.login') }}"><i class="fa-solid fa-lock"></i> Admin Portal</a></li>
        </ul>
      </div>

      <!-- Col 4: Contact Info -->
      <div class="col-lg-3 col-md-6">
        <h5 class="footer-heading">Connect With Us</h5>
        <div class="footer-contact-item">
          <i class="fa-solid fa-location-dot"></i>
          <span>{{ \App\Models\Setting::get('address', 'Kolkata - 700161, West Bengal, India') }}</span>
        </div>
        <div class="footer-contact-item">
          <i class="fa-solid fa-phone"></i>
          <div>
            <a href="tel:{{ \App\Models\Setting::get('phone_1', '9433053668') }}" class="text-white fw-bold">{{ \App\Models\Setting::get('phone_1', '9433053668') }}</a><br>
            <a href="tel:{{ \App\Models\Setting::get('phone_2', '9432430360') }}" class="text-white fw-bold">{{ \App\Models\Setting::get('phone_2', '9432430360') }}</a>
          </div>
        </div>
        <div class="footer-contact-item">
          <i class="fa-solid fa-envelope"></i>
          <span><a href="mailto:{{ \App\Models\Setting::get('email', 'debpriyan2021@gmail.com') }}" class="text-white">{{ \App\Models\Setting::get('email', 'debpriyan2021@gmail.com') }}</a></span>
        </div>
        <div class="footer-contact-item">
          <i class="fa-solid fa-clock"></i>
          <span>24 Hours / 7 Days Open</span>
        </div>
      </div>
    </div>

    <div class="footer-bottom text-center">
      <p class="mb-0">
        Copyright &copy; {{ date('Y') }} <strong>{{ \App\Models\Setting::get('site_name', 'Debpriyan Travels') }}</strong>. All Rights Reserved. | Built with PHP Laravel &amp; SQLite.
      </p>
    </div>
  </div>
</footer>
