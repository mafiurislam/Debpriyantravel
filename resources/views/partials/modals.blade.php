<!-- ================= QUICK BOOKING POPUP MODAL ================= -->
<div class="modal fade" id="quickBookingModal" tabindex="-1" aria-labelledby="bookingModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="bookingModalTitle">Book Your Travel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="modalBookingForm" action="{{ route('inquiry.store') }}" method="POST">
          @csrf
          <input type="hidden" name="vehicle_preferred" id="modalVehicleName" value="">
          <input type="hidden" name="service_type" id="modalServiceType" value="General Travel">

          <div class="mb-3">
            <label class="form-label fw-semibold">Pickup Location</label>
            <input type="text" class="form-control" name="pickup_location" id="modalPickup" placeholder="e.g. Kolkata Airport / Howrah" required>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Drop / Destination</label>
            <input type="text" class="form-control" name="drop_location" id="modalDrop" placeholder="e.g. Siliguri / Digha / City" required>
          </div>

          <div class="row g-2 mb-3">
            <div class="col-6">
              <label class="form-label fw-semibold">Travel Date</label>
              <input type="date" class="form-control" name="journey_date" id="modalDate" required>
            </div>
            <div class="col-6">
              <label class="form-label fw-semibold">Your Name</label>
              <input type="text" class="form-control" name="name" id="modalName" placeholder="Full Name" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Mobile Number</label>
            <input type="tel" class="form-control" name="phone" id="modalPhone" placeholder="10-digit number" required>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold">Special Instructions (Optional)</label>
            <textarea class="form-control" name="message" id="modalNotes" rows="2" placeholder="e.g. AC requirement, number of luggage, etc."></textarea>
          </div>

          <button type="submit" class="btn btn-warning w-100 fw-bold py-2 text-dark">
            <i class="fa-brands fa-whatsapp me-2"></i> Submit &amp; Connect on WhatsApp
          </button>
          <div class="text-center mt-2">
            <small class="text-muted"><i class="fa-solid fa-lock"></i> 100% Free Inquiry &amp; Instant Quote</small>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Video Player Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark border-0 rounded-4 overflow-hidden shadow-lg">
      <div class="modal-header border-0 pb-0 pt-3 px-3">
        <h5 class="modal-title text-white fs-6" id="videoModalLabel">Debpriyan Travels Video Tour &amp; Review</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-2 p-md-3">
        <div class="ratio ratio-16x9 rounded-3 overflow-hidden">
          <iframe id="videoIframe" src="" title="Debpriyan Travels Video Tour"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
