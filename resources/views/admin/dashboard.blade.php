@extends('admin.layout')

@section('title', 'Admin Dashboard')
@section('page_title', 'Dashboard Overview')

@section('content')

  <!-- Stat Cards -->
  <div class="row g-3 mb-4">
    <div class="col-xl-3 col-sm-6">
      <div class="stat-card">
        <div>
          <span class="text-muted small fw-semibold text-uppercase">1. Hero Sliders</span>
          <h3 class="fw-bold mb-0 text-dark">{{ $counts['sliders'] }}</h3>
          <small class="text-success"><i class="fa-solid fa-check-circle"></i> Active slides</small>
        </div>
        <div class="stat-icon bg-primary bg-opacity-10 text-primary">
          <i class="fa-solid fa-images"></i>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-sm-6">
      <div class="stat-card">
        <div>
          <span class="text-muted small fw-semibold text-uppercase">3. Core Services</span>
          <h3 class="fw-bold mb-0 text-dark">{{ $counts['services'] }}</h3>
          <small class="text-primary"><i class="fa-solid fa-car"></i> Featured solutions</small>
        </div>
        <div class="stat-icon bg-info bg-opacity-10 text-info">
          <i class="fa-solid fa-car-side"></i>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-sm-6">
      <div class="stat-card">
        <div>
          <span class="text-muted small fw-semibold text-uppercase">5. Fleet / Vehicles</span>
          <h3 class="fw-bold mb-0 text-dark">{{ $counts['vehicles'] }}</h3>
          <small class="text-warning"><i class="fa-solid fa-bus"></i> Cabs &amp; Tempos</small>
        </div>
        <div class="stat-icon bg-warning bg-opacity-10 text-warning">
          <i class="fa-solid fa-van-shuttle"></i>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-sm-6">
      <div class="stat-card">
        <div>
          <span class="text-muted small fw-semibold text-uppercase">Inquiries / Leads</span>
          <h3 class="fw-bold mb-0 text-dark">{{ $counts['inquiries'] }}</h3>
          <small class="text-danger fw-bold"><i class="fa-solid fa-bell"></i> {{ $counts['new_inquiries'] }} New unhandled</small>
        </div>
        <div class="stat-icon bg-danger bg-opacity-10 text-danger">
          <i class="fa-solid fa-inbox"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Action Tiles for Section Management -->
  <div class="row g-3 mb-4">
    <div class="col-12">
      <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-bolt text-warning me-2"></i> Section Management Shortcuts</h6>
        <div class="row g-2">
          <div class="col-md-3 col-6">
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-primary w-100 text-start py-2 rounded-3">
              <i class="fa-solid fa-images me-2"></i> 1. Hero Sliders
            </a>
          </div>
          <div class="col-md-3 col-6">
            <a href="{{ route('admin.route-highlight.edit') }}" class="btn btn-outline-primary w-100 text-start py-2 rounded-3">
              <i class="fa-solid fa-map-location-dot me-2"></i> 2. Route Banner
            </a>
          </div>
          <div class="col-md-3 col-6">
            <a href="{{ route('admin.services.index') }}" class="btn btn-outline-primary w-100 text-start py-2 rounded-3">
              <i class="fa-solid fa-car-side me-2"></i> 3. Core Services
            </a>
          </div>
          <div class="col-md-3 col-6">
            <a href="{{ route('admin.specializations.index') }}" class="btn btn-outline-primary w-100 text-start py-2 rounded-3">
              <i class="fa-solid fa-layer-group me-2"></i> 4. Travel Categories
            </a>
          </div>
          <div class="col-md-3 col-6">
            <a href="{{ route('admin.vehicles.index') }}" class="btn btn-outline-primary w-100 text-start py-2 rounded-3">
              <i class="fa-solid fa-van-shuttle me-2"></i> 5. Fleet / Vehicles
            </a>
          </div>
          <div class="col-md-3 col-6">
            <a href="{{ route('admin.videos.index') }}" class="btn btn-outline-primary w-100 text-start py-2 rounded-3">
              <i class="fa-solid fa-video me-2"></i> 6. Video Reviews
            </a>
          </div>
          <div class="col-md-3 col-6">
            <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-primary w-100 text-start py-2 rounded-3">
              <i class="fa-solid fa-suitcase-rolling me-2"></i> 7. Tour Packages
            </a>
          </div>
          <div class="col-md-3 col-6">
            <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-primary w-100 text-start py-2 rounded-3">
              <i class="fa-solid fa-sliders me-2"></i> 8. Site Settings
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Recent Inquiries Table -->
  <div class="table-card mb-4">
    <div class="table-card-header">
      <h6 class="mb-0 fw-bold text-dark"><i class="fa-solid fa-envelope-open-text me-2 text-primary"></i> Recent Booking Inquiries &amp; Leads</h6>
      <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-primary rounded-pill">View All Inquiries</a>
    </div>

    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th class="ps-4">Date</th>
            <th>Customer</th>
            <th>Contact</th>
            <th>Service / Vehicle</th>
            <th>Trip Details</th>
            <th>Status</th>
            <th class="text-end pe-4">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($recentInquiries as $inq)
          <tr>
            <td class="ps-4 small text-muted">{{ $inq->created_at->format('d M, h:i A') }}</td>
            <td class="fw-semibold text-dark">{{ $inq->name }}</td>
            <td>
              <a href="tel:{{ $inq->phone }}" class="text-decoration-none fw-bold text-primary">{{ $inq->phone }}</a>
              @if($inq->email)<div class="small text-muted">{{ $inq->email }}</div>@endif
            </td>
            <td><span class="badge bg-light text-dark border">{{ $inq->service_type ?: $inq->vehicle_preferred ?: 'General' }}</span></td>
            <td class="small">
              @if($inq->pickup_location && $inq->drop_location)
                <div>{{ $inq->pickup_location }} ➔ {{ $inq->drop_location }}</div>
              @endif
              @if($inq->journey_date)<small class="text-muted"><i class="fa-solid fa-calendar me-1"></i> {{ $inq->journey_date }}</small>@endif
            </td>
            <td>
              <form action="{{ route('admin.inquiries.status', $inq) }}" method="POST" class="d-inline">
                @csrf
                @method('PATCH')
                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                  <option value="new" {{ $inq->status == 'new' ? 'selected' : '' }}>New</option>
                  <option value="contacted" {{ $inq->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                  <option value="confirmed" {{ $inq->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                  <option value="cancelled" {{ $inq->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
              </form>
            </td>
            <td class="text-end pe-4">
              <a href="https://wa.me/91{{ preg_replace('/[^0-9]/', '', $inq->phone) }}?text={{ urlencode('Hello ' . $inq->name . ', this is Debpriyan Travels regarding your travel booking inquiry.') }}"
                target="_blank" class="btn btn-sm btn-success rounded-circle" title="Chat on WhatsApp">
                <i class="fa-brands fa-whatsapp"></i>
              </a>
              <form action="{{ route('admin.inquiries.destroy', $inq) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this inquiry?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="7" class="text-center py-4 text-muted">
              <i class="fa-solid fa-inbox fs-3 d-block mb-2 text-secondary"></i>
              No customer inquiries received yet. When visitors submit the booking forms on the website, they will appear here.
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

@endsection
