@extends('admin.layout')

@section('title', 'Travel Categories')
@section('page_title', 'Core Travel Categories / Specializations')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <h5 class="fw-bold mb-0">Specialization Cards</h5>
    <small class="text-muted">Manage the 4 specialization cards (Bus Ticket Booking, All India Ticket Booking, Car Rental, Bus Rental).</small>
  </div>
  <a href="{{ route('admin.specializations.create') }}" class="btn btn-primary rounded-pill">
    <i class="fa-solid fa-plus me-1"></i> Add Category
  </a>
</div>

<div class="table-card">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-4">Order</th>
          <th>Preview</th>
          <th>Title &amp; Bengali</th>
          <th>Button Text &amp; Link</th>
          <th>Status</th>
          <th class="text-end pe-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($specializations as $spec)
        <tr>
          <td class="ps-4 fw-bold text-muted">#{{ $spec->sort_order }}</td>
          <td>
            <img src="{{ asset($spec->image) }}" alt="Preview" class="rounded border" style="width: 80px; height: 50px; object-fit: cover;">
          </td>
          <td>
            <div class="fw-bold text-dark">{{ $spec->title }}</div>
            <small class="text-primary">{{ $spec->bengali_subtitle }}</small>
          </td>
          <td>
            <span class="badge bg-light text-dark border">{{ $spec->btn_text }}</span>
            <small class="text-muted d-block text-truncate" style="max-width: 200px;">{{ $spec->btn_link }}</small>
          </td>
          <td>
            @if($spec->is_active)
              <span class="badge bg-success">Active</span>
            @else
              <span class="badge bg-secondary">Inactive</span>
            @endif
          </td>
          <td class="text-end pe-4">
            <a href="{{ route('admin.specializations.edit', $spec) }}" class="btn btn-sm btn-outline-primary rounded-circle me-1" title="Edit">
              <i class="fa-solid fa-pen"></i>
            </a>
            <form action="{{ route('admin.specializations.destroy', $spec) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this travel category?')">
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
          <td colspan="6" class="text-center py-4 text-muted">No travel categories found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection
