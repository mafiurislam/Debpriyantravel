@extends('admin.layout')

@section('title', 'Tour Packages')
@section('page_title', 'Tour Packages Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <h5 class="fw-bold mb-0">Tour &amp; Holiday Packages</h5>
    <small class="text-muted">Manage tour packages, durations, pricing, descriptions, and itinerary details.</small>
  </div>
  <a href="{{ route('admin.packages.create') }}" class="btn btn-primary rounded-pill">
    <i class="fa-solid fa-plus me-1"></i> Add New Package
  </a>
</div>

<div class="table-card">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-4">Order</th>
          <th>Preview</th>
          <th>Package Name &amp; Destination</th>
          <th>Duration</th>
          <th>Price</th>
          <th>Status</th>
          <th class="text-end pe-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($packages as $pkg)
        <tr>
          <td class="ps-4 fw-bold text-muted">#{{ $pkg->sort_order }}</td>
          <td>
            <img src="{{ asset($pkg->image ?: 'assets/images/pkg-digha.jpg') }}" alt="{{ $pkg->name }}" class="rounded border" style="width: 80px; height: 50px; object-fit: cover;">
          </td>
          <td>
            <div class="fw-bold text-dark">{{ $pkg->name }}</div>
            <small class="text-primary">{{ $pkg->bengali_name ?: $pkg->destination }}</small>
          </td>
          <td>
            <span class="badge bg-light text-dark border">{{ $pkg->duration }}</span>
          </td>
          <td>
            <div class="fw-bold text-primary">{{ $pkg->price ?: 'Contact' }}</div>
          </td>
          <td>
            @if($pkg->is_active)
              <span class="badge bg-success">Active</span>
            @else
              <span class="badge bg-secondary">Inactive</span>
            @endif
          </td>
          <td class="text-end pe-4">
            <a href="{{ route('admin.packages.edit', $pkg) }}" class="btn btn-sm btn-outline-primary rounded-circle me-1" title="Edit">
              <i class="fa-solid fa-pen"></i>
            </a>
            <form action="{{ route('admin.packages.destroy', $pkg) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this package?')">
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
          <td colspan="7" class="text-center py-4 text-muted">No tour packages found. Click "Add New Package" to add one.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection
