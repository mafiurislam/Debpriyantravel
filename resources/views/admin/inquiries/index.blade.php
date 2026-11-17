@extends('admin.layout')

@section('title', 'Booking Inquiries')
@section('page_title', 'Customer Booking Inquiries & Leads')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <h5 class="fw-bold mb-0">Booking Inquiries &amp; Customer Leads</h5>
    <small class="text-muted">Inquiries submitted through the website's booking modals and contact page forms.</small>
  </div>
  <div class="d-flex gap-2">
    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">All ({{ \App\Models\Inquiry::count() }})</a>
    <a href="{{ route('admin.inquiries.index', ['status' => 'new']) }}" class="btn btn-sm btn-danger rounded-pill">New ({{ \App\Models\Inquiry::where('status', 'new')->count() }})</a>
    <a href="{{ route('admin.inquiries.index', ['status' => 'confirmed']) }}" class="btn btn-sm btn-success rounded-pill">Confirmed ({{ \App\Models\Inquiry::where('status', 'confirmed')->count() }})</a>
  </div>
</div>

<div class="table-card">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-4">Date</th>
          <th>Customer Name</th>
          <th>Phone &amp; Email</th>
          <th>Service / Vehicle</th>
          <th>Pickup ➔ Drop</th>
          <th>Travel Date</th>
          <th>Status</th>
          <th class="text-end pe-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($inquiries as $inq)
        <tr>
          <td class="ps-4 small text-muted">{{ $inq->created_at->format('d M Y, h:i A') }}</td>
          <td class="fw-bold text-dark">{{ $inq->name }}</td>
          <td>
            <a href="tel:{{ $inq->phone }}" class="text-decoration-none fw-bold text-primary">{{ $inq->phone }}</a>
            @if($inq->email)<div class="small text-muted">{{ $inq->email }}</div>@endif
          </td>
          <td>
            <span class="badge bg-light text-dark border">{{ $inq->service_type ?: $inq->vehicle_preferred ?: 'General Travel' }}</span>
          </td>
          <td class="small">
            @if($inq->pickup_location || $inq->drop_location)
              <div><strong>From:</strong> {{ $inq->pickup_location ?: 'N/A' }}</div>
              <div><strong>To:</strong> {{ $inq->drop_location ?: 'N/A' }}</div>
            @else
              <span class="text-muted">N/A</span>
            @endif
          </td>
          <td class="small text-muted">
            {{ $inq->journey_date ?: 'Flexible' }}
          </td>
          <td>
            <form action="{{ route('admin.inquiries.status', $inq) }}" method="POST">
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
            <a href="https://wa.me/91{{ preg_replace('/[^0-9]/', '', $inq->phone) }}?text={{ urlencode('Hello ' . $inq->name . ', this is Debpriyan Travels regarding your travel booking request.') }}"
              target="_blank" class="btn btn-sm btn-success rounded-circle me-1" title="Chat on WhatsApp">
              <i class="fa-brands fa-whatsapp"></i>
            </a>
            <form action="{{ route('admin.inquiries.destroy', $inq) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this inquiry record?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle" title="Delete">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @if($inq->message)
        <tr class="bg-light bg-opacity-50">
          <td colspan="8" class="ps-4 small text-muted py-2">
            <i class="fa-regular fa-comment-dots me-1 text-primary"></i> <strong>Message:</strong> {{ $inq->message }}
          </td>
        </tr>
        @endif
        @empty
        <tr>
          <td colspan="8" class="text-center py-4 text-muted">No booking inquiries found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($inquiries->hasPages())
  <div class="p-3 border-top">
    {{ $inquiries->links() }}
  </div>
  @endif
</div>

@endsection
