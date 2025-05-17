<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $title }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/') }}/AdminV3/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/') }}/AdminV3/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition lockscreen" style="background-image: url('{{ asset('storage/photos/Background_2.jpg') }}'); 
            height: 88vh; 
            width: 100%; 
            opacity:0.8;
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
            overflow: hidden;">
  >
  <!-- Automatic element centering -->
  <div class="lockscreen-wrapper"
    style="padding: 4px; color:black; border:none; border-radius: 20px; height: 350px; width:400px; position: absolute; top: 40%; left: 40%;">
    <!-- User name -->
    <div class="register-logo">
      <div><a href="{{ url('/portal') }}"></a><img src=" {{ asset('/storage/photos/' . $setting->logo_footer) }}"
          alt=" "></a>
      </div>
    </div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
      <!-- lockscreen image -->
      <div class="lockscreen-image">
        <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="User Image"
          style=" max-width:70px; max-height:70px;">
      </div>
      <!-- /.lockscreen-image -->

      <!-- lockscreen credentials (contains the form) -->
      <form class="lockscreen-credentials" action="{{ route('unlock') }}" method="post">
        @csrf
        <div class="input-group">
          <input type="password" class="form-control" name="password" required placeholder="password">

          <div class="input-group-append">
            <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
          </div>
        </div>
      </form>
      <!-- /.lockscreen credentials -->
    </div>
    <!-- /.center -->

    <!-- jQuery -->
    <script src="{{ url('/') }}/AdminV3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('/') }}/AdminV3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/AdminV3/dist/js/adminlte.min.js"></script>
</body>

</html>