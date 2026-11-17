@extends('admin.layout')

@section('title', 'Hero Sliders')
@section('page_title', 'Hero Slider Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <h5 class="fw-bold mb-0">Homepage Banner Slides</h5>
    <small class="text-muted">Manage the large hero slider images, titles, and text on the top of the homepage.</small>
  </div>
  <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary rounded-pill">
    <i class="fa-solid fa-plus me-1"></i> Add New Slide
  </a>
</div>

<div class="table-card">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-4">Order</th>
          <th>Preview</th>
          <th>Title &amp; Bengali Title</th>
          <th>Badge</th>
          <th>Status</th>
          <th class="text-end pe-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($sliders as $slider)
        <tr>
          <td class="ps-4 fw-bold text-muted">#{{ $slider->sort_order }}</td>
          <td>
            <img src="{{ asset($slider->image) }}" alt="Slider preview" class="rounded border" style="width: 100px; height: 50px; object-fit: cover;">
          </td>
          <td>
            <div class="fw-bold text-dark">{{ $slider->title ?: 'Slide #' . $slider->id }}</div>
            <small class="text-primary">{{ $slider->bengali_title }}</small>
          </td>
          <td>
            @if($slider->badge)<span class="badge bg-warning text-dark">{{ $slider->badge }}</span>@endif
          </td>
          <td>
            @if($slider->is_active)
              <span class="badge bg-success">Active</span>
            @else
              <span class="badge bg-secondary">Inactive</span>
            @endif
          </td>
          <td class="text-end pe-4">
            <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm btn-outline-primary rounded-circle me-1" title="Edit">
              <i class="fa-solid fa-pen"></i>
            </a>
            <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this slide?')">
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
          <td colspan="6" class="text-center py-4 text-muted">No slides found. Click "Add New Slide" to create one.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection
