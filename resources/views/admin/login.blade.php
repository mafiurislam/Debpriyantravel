<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | Debpriyan Travels</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #062b59 0%, #0d5bb8 100%);
      padding: 20px;
    }
    .login-card {
      width: 100%;
      max-width: 440px;
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }
    .login-header {
      background: #062b59;
      padding: 30px 24px;
      text-align: center;
      color: #fff;
    }
    .login-header img {
      height: 52px;
      background: #fff;
      padding: 6px;
      border-radius: 10px;
      margin-bottom: 12px;
    }
    .login-body {
      padding: 32px 28px;
    }
    .form-control:focus {
      border-color: #0d5bb8;
      box-shadow: 0 0 0 0.25rem rgba(13, 91, 184, 0.25);
    }
    .btn-login {
      background: #ffaa00;
      color: #062b59;
      font-weight: 700;
      border: none;
      padding: 12px;
      border-radius: 10px;
      width: 100%;
      transition: all 0.2s;
    }
    .btn-login:hover {
      background: #e69900;
      color: #031833;
    }
    .demo-credentials {
      background: #f8fafc;
      border: 1px dashed #cbd5e1;
      border-radius: 8px;
      padding: 12px;
      margin-bottom: 20px;
      font-size: 0.85rem;
    }
  </style>
</head>

<body>

  <div class="login-card">
    <div class="login-header">
      <img src="{{ asset('assets/images/logo.png') }}" alt="Debpriyan Travels">
      <h4 class="fw-bold mb-1">Debpriyan Travels</h4>
      <p class="mb-0 text-white-50 small">Admin Content Management Portal</p>
    </div>

    <div class="login-body">
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      @endif

      @if($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0 list-unstyled small">
          @foreach($errors->all() as $err)
          <li><i class="fa-solid fa-triangle-exclamation me-1"></i> {{ $err }}</li>
          @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      @endif

      <div class="demo-credentials text-muted">
        <div class="fw-bold text-dark mb-1"><i class="fa-solid fa-key text-warning me-1"></i> Authorized Credentials:</div>
        <div>User ID: <code class="text-primary fw-bold">adminat@12345</code></div>
        <div>Password: <code class="text-primary fw-bold">admin123</code></div>
      </div>

      <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label fw-semibold text-dark">User ID</label>
          <div class="input-group">
            <span class="input-group-text bg-light"><i class="fa-solid fa-user text-muted"></i></span>
            <input type="text" name="login" class="form-control" placeholder="adminat@12345" value="{{ old('login', 'adminat@12345') }}" required autofocus>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold text-dark">Password</label>
          <div class="input-group">
            <span class="input-group-text bg-light"><i class="fa-solid fa-lock text-muted"></i></span>
            <input type="password" name="password" class="form-control" placeholder="••••••••" value="admin123" required>
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
            <label class="form-check-label small text-muted" for="remember">Remember me</label>
          </div>
          <a href="{{ route('home') }}" class="small text-decoration-none text-muted"><i class="fa-solid fa-arrow-left"></i> Back to Site</a>
        </div>

        <button type="submit" class="btn btn-login">
          <i class="fa-solid fa-right-to-bracket me-2"></i> Log In to Dashboard
        </button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
