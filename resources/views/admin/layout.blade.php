<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Dashboard') | Debpriyan Travels</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Bootstrap 5.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    :root {
      --navy-dark: #062b59;
      --navy-light: #0d5bb8;
      --accent-yellow: #ffaa00;
      --sidebar-width: 260px;
    }
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6f9;
      color: #333;
    }
    .admin-wrapper {
      display: flex;
      min-height: 100vh;
    }
    .admin-sidebar {
      width: var(--sidebar-width);
      background: linear-gradient(180deg, #062b59 0%, #031833 100%);
      color: #fff;
      display: flex;
      flex-direction: column;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 1000;
      transition: all 0.3s;
      overflow-y: auto;
    }
    .sidebar-brand {
      padding: 20px 18px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
      color: #fff;
    }
    .sidebar-brand img {
      height: 40px;
      background: #fff;
      padding: 4px;
      border-radius: 8px;
    }
    .sidebar-brand-text h6 {
      margin: 0;
      font-weight: 700;
      font-size: 1rem;
      letter-spacing: 0.5px;
    }
    .sidebar-brand-text small {
      color: var(--accent-yellow);
      font-size: 0.72rem;
      text-transform: uppercase;
      font-weight: 600;
    }
    .sidebar-menu {
      padding: 15px 0;
      list-style: none;
      margin: 0;
      flex-grow: 1;
    }
    .menu-header {
      padding: 12px 20px 4px;
      font-size: 0.7rem;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.4);
      font-weight: 700;
      letter-spacing: 1px;
    }
    .menu-item a {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 20px;
      color: rgba(255, 255, 255, 0.75);
      text-decoration: none;
      font-size: 0.88rem;
      font-weight: 500;
      transition: all 0.2s;
      border-left: 3px solid transparent;
    }
    .menu-item a:hover {
      color: #fff;
      background: rgba(255, 255, 255, 0.08);
      border-left-color: var(--accent-yellow);
    }
    .menu-item.active a {
      color: #fff;
      background: rgba(13, 91, 184, 0.5);
      border-left-color: var(--accent-yellow);
      font-weight: 600;
    }
    .menu-item a i {
      width: 20px;
      font-size: 1rem;
      color: var(--accent-yellow);
    }
    .admin-main {
      margin-left: var(--sidebar-width);
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      min-width: 0;
    }
    .admin-topbar {
      height: 65px;
      background: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      padding: 0 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 999;
    }
    .admin-content {
      padding: 24px;
      flex-grow: 1;
    }
    .stat-card {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
      border: 1px solid rgba(0, 0, 0, 0.04);
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: transform 0.2s;
    }
    .stat-card:hover {
      transform: translateY(-2px);
    }
    .stat-icon {
      width: 50px;
      height: 50px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
    }
    .table-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
      border: 1px solid rgba(0, 0, 0, 0.04);
      overflow: hidden;
    }
    .table-card-header {
      padding: 16px 20px;
      border-bottom: 1px solid #edf2f7;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    @media (max-width: 992px) {
      .admin-sidebar {
        margin-left: calc(-1 * var(--sidebar-width));
      }
      .admin-sidebar.show {
        margin-left: 0;
      }
      .admin-main {
        margin-left: 0;
      }
    }
  </style>
  @yield('styles')
</head>

<body>
  <div class="admin-wrapper">
    <!-- Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
      <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Debpriyan Travels">
        <div class="sidebar-brand-text">
          <h6>Debpriyan</h6>
          <small>Admin Portal</small>
        </div>
      </a>

      <ul class="sidebar-menu">
        <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          <a href="{{ route('admin.dashboard') }}">
            <i class="fa-solid fa-gauge-high"></i> Dashboard
          </a>
        </li>

        <li class="menu-header">Website Sections</li>

        <li class="menu-item {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
          <a href="{{ route('admin.sliders.index') }}">
            <i class="fa-solid fa-images"></i> 1. Hero Sliders
          </a>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.route-highlight.*') ? 'active' : '' }}">
          <a href="{{ route('admin.route-highlight.edit') }}">
            <i class="fa-solid fa-map-location-dot"></i> 2. Route Banner
          </a>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
          <a href="{{ route('admin.services.index') }}">
            <i class="fa-solid fa-car-side"></i> 3. Core Services
          </a>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.specializations.*') ? 'active' : '' }}">
          <a href="{{ route('admin.specializations.index') }}">
            <i class="fa-solid fa-layer-group"></i> 4. Travel Categories
          </a>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.vehicles.*') ? 'active' : '' }}">
          <a href="{{ route('admin.vehicles.index') }}">
            <i class="fa-solid fa-van-shuttle"></i> 5. Fleet / Vehicles
          </a>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">
          <a href="{{ route('admin.videos.index') }}">
            <i class="fa-solid fa-video"></i> 6. Video Reviews
          </a>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.packages.*') ? 'active' : '' }}">
          <a href="{{ route('admin.packages.index') }}">
            <i class="fa-solid fa-suitcase-rolling"></i> 7. Tour Packages
          </a>
        </li>

        <li class="menu-header">CRM &amp; System</li>

        <li class="menu-item {{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
          <a href="{{ route('admin.inquiries.index') }}">
            <i class="fa-solid fa-inbox"></i> Booking Inquiries
            @php $newCount = \App\Models\Inquiry::where('status', 'new')->count(); @endphp
            @if($newCount > 0)
              <span class="badge bg-danger ms-auto">{{ $newCount }}</span>
            @endif
          </a>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
          <a href="{{ route('admin.settings.index') }}">
            <i class="fa-solid fa-sliders"></i> Site Settings
          </a>
        </li>

        <li class="menu-item">
          <a href="{{ route('home') }}" target="_blank">
            <i class="fa-solid fa-arrow-up-right-from-square"></i> Visit Website
          </a>
        </li>
      </ul>

      <div class="p-3 border-top border-white border-opacity-10 mt-auto">
        <form action="{{ route('admin.logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-sm btn-outline-danger w-100 rounded-pill">
            <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
          </button>
        </form>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="admin-main">
      <!-- Topbar -->
      <header class="admin-topbar">
        <button class="btn btn-sm btn-outline-secondary d-lg-none" type="button" onclick="document.getElementById('adminSidebar').classList.toggle('show')">
          <i class="fa-solid fa-bars"></i>
        </button>

        <div class="d-none d-md-block">
          <h5 class="mb-0 fw-bold text-dark">@yield('page_title', 'Dashboard')</h5>
          <small class="text-muted">Manage website contents section-by-section</small>
        </div>

        <div class="d-flex align-items-center gap-3">
          <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill">
            <i class="fa-solid fa-globe me-1"></i> Live Site
          </a>
          <div class="dropdown">
            <button class="btn btn-sm btn-light dropdown-toggle rounded-pill px-3" type="button" data-bs-toggle="dropdown">
              <i class="fa-solid fa-circle-user text-primary me-1"></i> {{ Auth::user()->name ?? 'Admin' }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
              <li><a class="dropdown-item" href="{{ route('admin.settings.index') }}"><i class="fa-solid fa-gear me-2"></i> Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="{{ route('admin.logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item text-danger"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </header>

      <!-- Page Content -->
      <main class="admin-content">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
          <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
          <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
          <strong>Please fix the errors below:</strong>
          <ul class="mb-0 mt-2">
            @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @yield('content')
      </main>
    </div>
  </div>

  <!-- jQuery & Bootstrap Bundle -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  @yield('scripts')
</body>

</html>
