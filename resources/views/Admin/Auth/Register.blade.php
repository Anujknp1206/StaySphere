<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Authentication</title>
  <!--begin::Primary Meta Tags-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="title" content="Authentication Page" />
  <meta name="author" content="ColorlibHQ" />
  <meta name="description" content="Authentication For StaySphere Application" />
  <meta name="keywords" content="StaySphere Login Register" />
  <!--end::Primary Meta Tags-->
  <!--begin::Fonts-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
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
</head>
<!--end::Head-->
<!--begin::Body-->

<style>
  .btn-custom {
    width: 100px;
    background-color: #800020;
    color: white;
    font-weight: 500;
    transition: background-color 0.6s ease;
  }

  .btn-custom:hover {
    background-color: #A52A2A;
    color: white;
    font-weight: 650;
  }

  .register-card-body {
    background: linear-gradient(22deg, #8B4513, #ffffff);

  }

  .custom-bg-input {
    background-color: #f5f5f5;
    /* light grey */
  }

  .login-box-msg {
    font-size: 20px;
    font-weight: 400px;
  }

  .link {
    font-size: 17px;
    font-weight: 600px;


  }

  .link {
    font-size: 17px;
    font-weight: 800px;
  }
</style>

<body class="register-page bg-body-secondary" style="background: linear-gradient(22deg, #ffffff, #8B4513);">
  <div class="register-box">
    <div class="register-logo">
      <div><a href="{{ url('/portal') }}"></a><img src=" {{ asset('/storage/photos/' . $setting->logo_footer) }}" alt=" "
          ></a>
      </div>
    </div>
    <!-- /.register-logo -->
    <div class="card">
      <div class="card-body register-card-body">
        <p class="register-box-msg">Welcome to the family</p>
        <form action="{{ route('registerUser') }}" method="post" enctype="multipart/form-data" autocomplete="off">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" required name="name" placeholder="Full Name" />
            <div class="input-group-text"><span class="bi bi-person"></span></div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" required name="email" placeholder="Email" />
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
          </div>
          <div class="input-group mb-3">
            <input type="phone" class="form-control" required name="phone" placeholder="Phone" />
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" required name="password" placeholder="Password" />
            <div class="input-group-text" style="cursor: pointer;">
              <span class="bi bi-lock-fill" id="toggle-password" style="cursor: pointer;"></span>
            </div>
          </div>
          <div class="input-group mb-3">
            <input style="padding:3px;" type="file" class="form-control" name="photo" accept="image/*">
            <div class="input-group-text"><span class="bi bi-image"></span></div>
          </div>


          <!--begin::Row-->
          <div class="row">

            <!-- /.col -->
            <div class="col-12">
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-custom ">Register</button>
              </div>
            </div>

            <!-- /.col -->
          </div>
          <!--end::Row-->
        </form>

        <!-- /.social-auth-links -->
        <p class="mb-0 link">
          <a href="{{ url('/portal') }}" class="text-center" style="text-decoration: none; color: black;"> I already
            have
            a membership </a>
        </p>
      </div>
      <!-- /.register-card-body -->
    </div>
  </div>
  @include('sweetalert::alert')
  <!-- /.login-box -->
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#toggle-password').on('click', function () {
        try {
          const passwordInput = $('#password');
          const icon = $(this);

          if (!passwordInput.length) {
            throw new Error('Password input field not found!');
          }

          const isPassword = passwordInput.attr('type') === 'password';
          passwordInput.attr('type', isPassword ? 'text' : 'password');

          icon.toggleClass('bi-lock-fill bi-unlock-fill');
        } catch (error) {
          console.error(error); // For debugging in console
          alert('Something went wrong while toggling password visibility.');
        }
      });
    });
  </script>
</body>
<!--end::Body-->

</html>