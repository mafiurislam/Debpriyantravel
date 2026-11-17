@extends('admin.layout')

@section('title', 'Fleet Vehicles')
@section('page_title', 'Vehicles & Fleet Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <h5 class="fw-bold mb-0">Fleet Vehicles &amp; Cabs</h5>
    <small class="text-muted">Manage available rental vehicles, seating capacity, hourly &amp; km rates, and features.</small>
  </div>
  <a href="{{ route('admin.vehicles.create') }}" class="btn btn-primary rounded-pill">
    <i class="fa-solid fa-plus me-1"></i> Add New Vehicle
  </a>
</div>

<div class="table-card">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-4">Order</th>
          <th>Preview</th>
          <th>Vehicle Name</th>
          <th>Category &amp; Capacity</th>
          <th>Rates (Hr / Km)</th>
          <th>Status</th>
          <th class="text-end pe-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($vehicles as $vehicle)
        <tr>
          <td class="ps-4 fw-bold text-muted">#{{ $vehicle->sort_order }}</td>
          <td>
            <img src="{{ asset($vehicle->image ?: 'assets/images/sedan.jpg') }}" alt="{{ $vehicle->name }}" class="rounded border" style="width: 80px; height: 50px; object-fit: cover;">
          </td>
          <td>
            <div class="fw-bold text-dark">{{ $vehicle->name }}</div>
            <small class="text-muted">{{ $vehicle->rate_package }}</small>
          </td>
          <td>
            <span class="badge bg-light text-dark border">{{ $vehicle->category }}</span>
            <small class="d-block text-muted">{{ $vehicle->capacity }}</small>
          </td>
          <td>
            <div class="small fw-semibold text-primary">{{ $vehicle->rate_hourly }}</div>
            <div class="small text-muted">{{ $vehicle->rate_km }}</div>
          </td>
          <td>
            @if($vehicle->is_active)
              <span class="badge bg-success">Active</span>
            @else
              <span class="badge bg-secondary">Inactive</span>
            @endif
          </td>
          <td class="text-end pe-4">
            <a href="{{ route('admin.vehicles.edit', $vehicle) }}" class="btn btn-sm btn-outline-primary rounded-circle me-1" title="Edit">
              <i class="fa-solid fa-pen"></i>
            </a>
            <form action="{{ route('admin.vehicles.destroy', $vehicle) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this vehicle?')">
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
          <td colspan="7" class="text-center py-4 text-muted">No vehicles found. Click "Add New Vehicle" to add one.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection
