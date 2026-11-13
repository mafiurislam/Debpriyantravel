/**
 * Debpriyan Travels - Main JavaScript
 * Handling Sticky Navbar, WhatsApp Dynamic Inquiries, Modals & UI Interactions
 */

$(document).ready(function () {
  'use strict';

  // Primary Business Details
  const PRIMARY_PHONE = "9433053668";
  const SECONDARY_PHONE = "9432430360";
  const WHATSAPP_NUMBER = "919433053668";

  // 1. Sticky Navbar on Scroll
  $(window).on('scroll', function () {
    if ($(this).scrollTop() > 50) {
      $('.main-navbar').addClass('scrolled');
      $('#backToTop').addClass('show');
    } else {
      $('.main-navbar').removeClass('scrolled');
      $('#backToTop').removeClass('show');
    }
  });

  // 2. Back to Top Click
  $('#backToTop').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 500);
  });

  // Hero Carousel Auto-slide Initialization
  const heroCarouselEl = document.getElementById('heroCarousel');
  if (heroCarouselEl && typeof bootstrap !== 'undefined') {
    new bootstrap.Carousel(heroCarouselEl, {
      interval: 4000,
      ride: 'carousel',
      pause: false
    });
  }

  // 3. Set Minimum Date to Today for Date Inputs
  const today = new Date().toISOString().split('T')[0];
  $('input[type="date"]').attr('min', today);

  // 4. Quick Pre-select Vehicle in Modal
  $(document).on('click', '.btn-book-vehicle', function () {
    const vehicleName = $(this).data('vehicle') || '';
    const serviceType = $(this).data('service') || '';

    $('#modalVehicleName').val(vehicleName);
    if (serviceType && $('#modalServiceType').length) {
      $('#modalServiceType').val(serviceType);
    }

    $('#bookingModalTitle').text('Book ' + (vehicleName ? vehicleName : 'Your Travel'));
  });

  // 5. Booking Form WhatsApp Submission (Hero Widget)
  $('#heroBookingForm').on('submit', function (e) {
    e.preventDefault();

    const service = $('#widgetServiceType').val() || 'Travel Booking';
    const pickup = $('#widgetPickup').val() || 'Kolkata';
    const destination = $('#widgetDestination').val() || 'Not specified';
    const date = $('#widgetDate').val() || 'Flexible';
    const passengers = $('#widgetPassengers').val() || '1+';
    const name = $('#widgetName').val() || 'Customer';
    const phone = $('#widgetPhone').val() || '';

    let text = `*New Travel Inquiry - Debpriyan Travels*\n\n`;
    text += `*Service:* ${service}\n`;
    text += `*From:* ${pickup}\n`;
    text += `*To:* ${destination}\n`;
    text += `*Travel Date:* ${date}\n`;
    text += `*Passengers / Vehicle:* ${passengers}\n`;
    text += `*Name:* ${name}\n`;
    if (phone) text += `*Contact:* ${phone}\n`;
    text += `\nPlease share best available quote and availability.`;

    const encoded = encodeURIComponent(text);
    const waUrl = `https://wa.me/${WHATSAPP_NUMBER}?text=${encoded}`;
    window.open(waUrl, '_blank');
  });

  // 6. Modal Booking Form WhatsApp Submission
  $('#modalBookingForm').on('submit', function (e) {
    e.preventDefault();

    const vehicle = $('#modalVehicleName').val() || 'Vehicle / Ticket';
    const service = $('#modalServiceType').val() || 'Travel Service';
    const pickup = $('#modalPickup').val() || 'Kolkata';
    const drop = $('#modalDrop').val() || 'Destination';
    const date = $('#modalDate').val() || 'Flexible';
    const name = $('#modalName').val() || 'Customer';
    const phone = $('#modalPhone').val() || '';
    const notes = $('#modalNotes').val() || '';

    let text = `*Booking Request - Debpriyan Travels*\n\n`;
    text += `*Vehicle/Category:* ${vehicle}\n`;
    text += `*Service Type:* ${service}\n`;
    text += `*Pickup:* ${pickup}\n`;
    text += `*Destination:* ${drop}\n`;
    text += `*Travel Date:* ${date}\n`;
    text += `*Customer Name:* ${name}\n`;
    text += `*Contact:* ${phone}\n`;
    if (notes) text += `*Special Requirement:* ${notes}\n`;
    text += `\nPlease confirm booking & pricing.`;

    const encoded = encodeURIComponent(text);
    const waUrl = `https://wa.me/${WHATSAPP_NUMBER}?text=${encoded}`;
    
    // Close modal
    const modalEl = document.getElementById('quickBookingModal');
    if (modalEl) {
      const modal = bootstrap.Modal.getInstance(modalEl);
      if (modal) modal.hide();
    }

    window.open(waUrl, '_blank');
  });

  // 7. General Contact Form Submission
  $('#contactInquiryForm').on('submit', function (e) {
    e.preventDefault();

    const name = $('#contactName').val();
    const phone = $('#contactPhone').val();
    const email = $('#contactEmail').val();
    const subject = $('#contactSubject').val();
    const message = $('#contactMessage').val();

    let text = `*General Inquiry - Debpriyan Travels*\n\n`;
    text += `*Name:* ${name}\n`;
    text += `*Phone:* ${phone}\n`;
    if (email) text += `*Email:* ${email}\n`;
    text += `*Subject:* ${subject}\n`;
    text += `*Message:* ${message}\n`;

    const encoded = encodeURIComponent(text);
    const waUrl = `https://wa.me/${WHATSAPP_NUMBER}?text=${encoded}`;
    
    alert('Thank you! Redirecting to WhatsApp to send your inquiry directly to our 24x7 desk.');
    window.open(waUrl, '_blank');
  });

  // 8. Auto-close mobile navbar when item is clicked
  $('.navbar-nav .nav-link').on('click', function () {
    if ($('.navbar-collapse').hasClass('show')) {
      $('.navbar-toggler').click();
    }
  });

  console.log('Debpriyan Travels site initialized successfully.');
});

