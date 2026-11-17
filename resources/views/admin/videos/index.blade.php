@extends('admin.layout')

@section('title', 'Video Reviews')
@section('page_title', 'Customer Video Reviews Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
  <div>
    <h5 class="fw-bold mb-0">Customer Video Reviews</h5>
    <small class="text-muted">Manage YouTube review videos and thumbnails shown in the video gallery on the homepage.</small>
  </div>
  <a href="{{ route('admin.videos.create') }}" class="btn btn-primary rounded-pill">
    <i class="fa-solid fa-plus me-1"></i> Add Video Review
  </a>
</div>

<div class="table-card">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-4">Order</th>
          <th>Thumbnail</th>
          <th>Title</th>
          <th>YouTube Video ID</th>
          <th>Status</th>
          <th class="text-end pe-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($videos as $vid)
        <tr>
          <td class="ps-4 fw-bold text-muted">#{{ $vid->sort_order }}</td>
          <td>
            <div class="position-relative d-inline-block">
              <img src="{{ asset($vid->thumbnail ?: 'assets/images/video-thumb-1.webp') }}" alt="{{ $vid->title }}" class="rounded border" style="width: 90px; height: 50px; object-fit: cover;">
              <span class="position-absolute top-50 start-50 translate-middle text-white bg-dark bg-opacity-75 rounded-circle px-2 py-1 small">
                <i class="fa-solid fa-play"></i>
              </span>
            </div>
          </td>
          <td>
            <div class="fw-bold text-dark">{{ $vid->title }}</div>
          </td>
          <td>
            <a href="https://www.youtube.com/watch?v={{ $vid->youtube_id }}" target="_blank" class="text-decoration-none badge bg-danger">
              <i class="fa-brands fa-youtube me-1"></i> {{ $vid->youtube_id }}
            </a>
          </td>
          <td>
            @if($vid->is_active)
              <span class="badge bg-success">Active</span>
            @else
              <span class="badge bg-secondary">Inactive</span>
            @endif
          </td>
          <td class="text-end pe-4">
            <a href="{{ route('admin.videos.edit', $vid) }}" class="btn btn-sm btn-outline-primary rounded-circle me-1" title="Edit">
              <i class="fa-solid fa-pen"></i>
            </a>
            <form action="{{ route('admin.videos.destroy', $vid) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this video review?')">
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
          <td colspan="6" class="text-center py-4 text-muted">No video reviews found. Click "Add Video Review" to add one.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection
