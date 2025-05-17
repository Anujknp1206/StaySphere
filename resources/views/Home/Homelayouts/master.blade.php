<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ url('/') }}/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/front/css/flatpickr.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/front/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/front/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/front/css/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdtimepicker/mdtimepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <link rel="shortcut icon" href="{{ url('/') }}/front/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="{{ url('/') }}/front/images/favicon.png" type="image/x-icon">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>

<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader"></div> -->
        @include('home.homelayouts.header')
        @if (Route::is('home'))
            @include('home.homelayouts.mainBanner')
        @else
            @include('home.homelayouts.banner')
        @endif
        @yield('content')

        @include('home.homelayouts.footer')
        @include('sweetalert::alert')

        <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>
    </div><!-- End Page Wrapper -->
    <script data-cfasync="false"
        src="{{ url('/') }}/front/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ url('/') }}/front/js/jquery.js"></script>
    <script src="{{ url('/') }}/front/js/popper.min.js"></script>
    <script src="{{ url('/') }}/front/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/front/js/slick.min.js"></script>
    <script src="{{ url('/') }}/front/js/slick-animation.min.js"></script>
    <script src="{{ url('/') }}/front/js/jquery.fancybox.js"></script>
    <script src="{{ url('/') }}/front/js/wow.js"></script>
    <script src="{{ url('/') }}/front/js/appear.js"></script>
    <script src="{{ url('/') }}/front/js/mixitup.js"></script>
    <script src="{{ url('/') }}/front/js/flatpickr.js"></script>
    <script src="{{ url('/') }}/front/js/swiper.min.js"></script>
    <script src="{{ url('/') }}/front/js/gsap.min.js"></script>
    <script src="{{ url('/') }}/front/js/ScrollTrigger.min.js"></script>
    <script src="{{ url('/') }}/front/js/SplitText.min.js"></script>
    <script src="{{ url('/') }}/front/js/splitType.js"></script>
    <script src="{{ url('/') }}/front/js/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="{{ url('/') }}/front/js/bxslider.js"></script>
    <script src="{{ url('/') }}/front/js/owl.js"></script>
    <script src="{{ url('/') }}/front/js/jquery.validate.min.js"></script>
    <script src="{{ url('/') }}/front/js/jquery.form.min.js"></script>
    <script src="{{ url('/') }}/front/js/script-gsap.js"></script>
    <script src="{{ url('/') }}/front/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/timecircles@1.5.1/build/TimeCircles.js"></script>
</body>

</html>