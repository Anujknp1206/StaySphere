<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Stay Sphere | Register Page </title>
  <!--begin::Primary Meta Tags-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <meta name="title" content="Authentication Page" />
  <meta name="author" content="ColorlibHQ" />
  <meta name="description" content="Authentication For StaySphere Application" />
  <meta name="keywords" content="StaySphere Login Register" />
  <!--end::Primary Meta Tags-->
  <!--begin::Fonts-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!--end::Fonts-->
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
    integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
  <!--end::Third Party Plugin(OverlayScrollbars)-->
  <!--begin::Third Party Plugin(Bootstrap Icons)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
  <!--end::Third Party Plugin(Bootstrap Icons)-->
  <!--begin::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="{{ url('/') }}/AdminV3/dist/css/adminlte.css" />
  <!--end::Required Plugin(AdminLTE)-->
  <style>
    body.hotel-register {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1600') center center/cover no-repeat;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
    }

    body.hotel-register::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(rgba(0, 0, 0, .65), rgba(20, 20, 20, .70));
    }

    .register-container {
      position: relative;
      z-index: 2;
      width: 100%;
      display: flex;
      justify-content: center;
      padding: 20px;
    }

    .register-card {
      width: 460px;
      max-width: 100%;
      background: rgba(255, 255, 255, .10);
      backdrop-filter: blur(18px);
      border: 1px solid rgba(255, 255, 255, .18);
      border-radius: 20px;
      padding: 45px;
      box-shadow: 0 25px 60px rgba(0, 0, 0, .40);
    }

    .register-header {
      text-align: center;
      margin-bottom: 10px;
    }

    .logo {
      width: 220px;
      max-width: 100%;
    }

    .register-header h2 {
      color: #fff;
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 5px;
    }

    .register-header p {
      color: #d8d8d8;
      font-size: 15px;
    }

    .alert-error {
      background: rgba(220, 53, 69, .18);
      border: 1px solid rgba(220, 53, 69, .5);
      color: #ffd7db;
      padding: 12px 15px;
      border-radius: 10px;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .input-group {
      position: relative;
      margin-bottom: 16px;
    }

    .input-group input:not([type="file"]) {
      width: 100%;
      height: 50px;
      padding: 0 45px;
      border: none;
      border-radius: 10px;
      background: rgba(255, 255, 255, .15);
      color: #fff;
      font-size: 15px;
      outline: none;
      box-sizing: border-box;
    }

    .input-group input::placeholder {
      color: rgba(255, 255, 255, .65);
    }

    .input-group input.is-invalid {
      border: 1px solid #dc3545;
    }

    .input-group i {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #D4AF37;
      font-size: 17px;
    }

    #toggle-password {
      position: absolute;
      right: 58px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #D4AF37;
      font-size: 17px;
    }

    .field-error {
      color: #ff9aa2;
      font-size: 13px;
      margin: -10px 0 14px 4px;
    }

    .file-group {
      background: rgba(255, 255, 255, .15);
      border-radius: 10px;
      padding: 10px 14px 10px 45px;
    }

    .file-group label {
      color: #d8d8d8;
      font-size: 13px;
      display: block;
      margin-bottom: 4px;
    }

    .file-group input[type="file"] {
      width: 100%;
      color: #fff;
      font-size: 13px;
    }

    .register-btn {
      width: 100%;
      padding: 16px;
      border: none;
      border-radius: 12px;
      background: linear-gradient(135deg, #d4af37, #b8860b);
      color: #fff;
      font-size: 17px;
      font-weight: 600;
      cursor: pointer;
      transition: .35s;
    }

    .register-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 30px rgba(212, 175, 55, .45);
    }

    .login-link {
      text-align: center;
      color: #fff;
      margin-top: 25px;
    }

    .login-link a {
      color: #d4af37;
      text-decoration: none;
      font-weight: 600;
    }

    @media(max-width:576px) {
      .register-card {
        width: 90%;
        padding: 30px;
      }

      .register-header h2 {
        font-size: 22px;
      }
    }
  </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="hotel-register">

  <div class="register-container">
    <div class="register-card">

      <div class="register-header">
        <img src="{{ asset('/storage/photos/' . $setting->logo_footer) }}" class="logo">
        <h2>Hotel Management</h2>
        <p>Welcome to the family</p>
      </div>

      @if (session('error'))
        <div class="alert-error">{{ session('error') }}</div>
      @endif

      <form action="{{ route('registerUser') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf

        <div class="input-group">
          <i class="bi bi-person"></i>
          <input type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" required autofocus>
        </div>
        @error('name')
          <div class="field-error">{{ $message }}</div>
        @enderror

        <div class="input-group">
          <i class="bi bi-envelope"></i>
          <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
        </div>
        @error('email')
          <div class="field-error">{{ $message }}</div>
        @enderror

        <div class="input-group">
          <i class="bi bi-telephone"></i>
          <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="Phone" required>
        </div>
        @error('phone')
          <div class="field-error">{{ $message }}</div>
        @enderror

        <div class="input-group">
          <i class="bi bi-lock"></i>
          <input id="password" type="password" name="password" placeholder="Password" required>
          <span id="toggle-password">
            <i class="bi bi-eye-fill"></i>
          </span>
        </div>
        @error('password')
          <div class="field-error">{{ $message }}</div>
        @enderror
        <button type="submit" class="register-btn">Register</button>

        <div class="login-link">
          <a href="{{ url('/portal') }}">I already have a membership</a>
        </div>

      </form>
    </div>
  </div>

  @include('sweetalert::alert')

  <script>
    document.getElementById('toggle-password').addEventListener('click', function () {
      const passwordInput = document.getElementById('password');
      const icon = this.querySelector('i');
      const isHidden = passwordInput.type === 'password';

      passwordInput.type = isHidden ? 'text' : 'password';
      icon.classList.toggle('bi-eye-fill', !isHidden);
      icon.classList.toggle('bi-eye-slash-fill', isHidden);
    });
  </script>

</body>
<!--end::Body-->

</html>