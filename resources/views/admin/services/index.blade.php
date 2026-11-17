@extends('admin.layout')

@section('title', 'Core Services')
@section('page_title', 'Core Services Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <h5 class="fw-bold mb-0">Debpriyan Transport &amp; Rental Services</h5>
    <small class="text-muted">Manage the core service cards (Car Rental, Govt Office Travel, Corporate Travel, Gari Vara, etc.)</small>
  </div>
  <a href="{{ route('admin.services.create') }}" class="btn btn-primary rounded-pill">
    <i class="fa-solid fa-plus me-1"></i> Add New Service
  </a>
</div>

<div class="table-card">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-4">Order</th>
          <th>Icon</th>
          <th>Service Title &amp; Bengali Subtitle</th>
          <th>Category</th>
          <th>WhatsApp Inquiry</th>
          <th>Status</th>
          <th class="text-end pe-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($services as $service)
        <tr>
          <td class="ps-4 fw-bold text-muted">#{{ $service->sort_order }}</td>
          <td>
            <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
              <i class="{{ $service->icon ?: 'fa-solid fa-car' }}"></i>
            </div>
          </td>
          <td>
            <div class="fw-bold text-dark">{{ $service->title }}</div>
            <small class="text-primary">{{ $service->bengali_subtitle }}</small>
          </td>
          <td>
            <span class="badge bg-light text-dark border">{{ $service->category }}</span>
          </td>
          <td class="small text-muted" style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
            {{ $service->whatsapp_message }}
          </td>
          <td>
            @if($service->is_active)
              <span class="badge bg-success">Active</span>
            @else
              <span class="badge bg-secondary">Inactive</span>
            @endif
          </td>
          <td class="text-end pe-4">
            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-primary rounded-circle me-1" title="Edit">
              <i class="fa-solid fa-pen"></i>
            </a>
            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this service?')">
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
          <td colspan="7" class="text-center py-4 text-muted">No services found. Click "Add New Service" to create one.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection
