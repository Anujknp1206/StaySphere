<!-- Main Header-->
<header class="main-header header-style-five">
  <div class="header-top">
    <div class="inner-box">
      <!-- Top-left -->
      <div class="top-left">
        <ul class="social-icon-one">
          <li><a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="{{ $setting->instagram }}"><i class="fa-brands fa-instagram"></i></a></li>
          <li><a href="{{ $setting->linkedin }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
          <li><a href="{{ $setting->whatsapp }}"><i class="fab fa-x-twitter"></i></a></li>
        </ul>
      </div>
      <!-- top-right -->
      <div class="top-right">
        <span><i class="icon fa-solid fa-envelope"></i> <a href=""
            style="color:white; font-size: 16px;">{{ $setting->website }}</a></span>
        <span><i class="icon fa-sharp fa-solid fa-location-dot" style="font-size: 18px;"></i> {{ $setting->address }}</span>
      </div>
    </div>
  </div>
  <div class="header-lower">
    <!-- Main box -->
    <div class="main-box">
      <div class="logo-box">
        <div class="logo flex"><a href="#"><img src="{{ url('/') }}/storage/photos/StaySphereT.png" alt=""
              title="Hoteler" style=" height:100px; width:200px"></a></div>
      </div>

      <!--Nav Box-->
      <div class="nav-outer">
        <nav class="nav main-menu">
          <ul class="navigation onepage-nav">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('aboutus') }}">About</a></li>
            <li><a href="{{ route('roomList') }}">Rooms</a></li>
            <li><a href="{{ route('faqs') }}">Faq's</a></li>

            <li><a href="{{ route('testimonials') }}">Testimonial</a></li>
            <li><a href="{{ route('teamdetails') }}">Team</a></li>
            <li><a href="{{route('contactus')}}">Contact</a></li>
          </ul>
        </nav>
        <!-- Main Menu End-->
      </div>

      <div class="outer-box">
        <div class="ui-btn-outer">
          <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" class="ui-btn cart-btn">
            @guest
        <i class="lnr-icon-users"></i> {{-- Shown if NOT logged in --}}
      @else
        <i class="fa-brands fa-jedi-order"></i> {{-- Shown if logged in --}}
      @endguest
          </a>

          <button class="ui-btn ui-btn search-btn">
            <span class="icon lnr lnr-icon-search"></span>
          </button>
          <a href="{{route('cart.show')}}" class="ui-btn cart-btn">
            <i class="lnr-icon-shopping-cart"></i>
            <span class="items-count">{{ $cartCount }}</span>
          </a>
        </div>
        <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
        <!-- Mobile Nav toggler -->
      </div>
    </div>
    <!-- Mobile Menu  -->
    <div class="mobile-menu">
      <div class="menu-backdrop"></div>
      <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
      <nav class="menu-box">
        <div class="upper-box">
          <div class="nav-logo"><a href="#"><img src="{{ url('/') }}/storage/photos/StaySphereT.png" alt=""
                style="max-height:110px;"></a></div>
          <div class="close-btn"><i class="icon fa fa-times"></i></div>
        </div>
        <ul class="navigation onepage-nav clearfix">
          <!--Keep This Empty / Menu will come through Javascript-->
        </ul>
        <ul class="contact-list-one">
          <li>
            <!-- Contact Info Box -->
            <div class="contact-info-box">
              <i class="icon lnr-icon-phone-handset"></i>
              <span class="title">Call Now</span>
              <a href="tel:+92880098670">{{ $setting->phone_no }}</a>
            </div>
          </li>
          <li>
            <!-- Contact Info Box -->
            <div class="contact-info-box">
              <span class="icon lnr-icon-envelope1"></span>
              <span class="title">Send Email</span>
              <a href="https://html.kodesolution.com/cdn-cgi/l/email-protection#264e434a566645494b5647485f0845494b"><span
                  class="__cf_email__"
                  data-cfemail="4e262b223e0e2d21233e2f2037602d2123">{{ $setting->website }}</span></a>
            </div>
          </li>
          <li>
            <!-- Contact Info Box -->
            <div class="contact-info-box">
              <span class="icon lnr-icon-clock"></span>
              <span class="title">Send Email</span>
              Mon - Sat 8:00 - 6:30, Sunday - CLOSED
            </div>
          </li>
        </ul>
        <ul class="social-links">
          <li><a href="{{ $setting->facebook }}"><i class="fab fa-x-twitter"></i></a></li>
          <li><a href="{{ $setting->instagram }}"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="{{ $setting->linkedin }}"><i class="fab fa-pinterest"></i></a></li>
          <li><a href="{{ $setting->whatsapp }}"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </nav>
    </div><!-- End Mobile Menu -->

    <!-- Header Search -->
    <div class="search-popup">
      <span class="search-back-drop"></span>
      <button class="close-search"><span class="fa fa-times"></span></button>
      <div class="search-inner">
        <form method="post" action="https://html.kodesolution.com/2025/hoteler-html/index.html">
          <div class="form-group">
            <input type="search" name="search-field" value="" placeholder="Search..." required="">
            <button type="submit"><i class="fa fa-search"></i></button>
          </div>
        </form>
      </div>
    </div>
    <!-- End Header Search -->

    <!-- Sticky Header  -->
    <div class="sticky-header">
      <div class="auto-container">
        <div class="inner-container">

          <!--Right Col-->
          <div class="nav-outer">
            <!-- Main Menu -->
            <nav class="main-menu">
              <div class="navbar-collapse show collapse clearfix">
                <ul class="navigation onepage-nav clearfix">
                  <!--Keep This Empty / Menu will come through Javascript-->
                </ul>
              </div>
            </nav><!-- Main Menu End-->
            <!--Mobile Navigation Toggler-->
            <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
          </div>
        </div>
      </div>
    </div><!-- End Sticky Menu -->
  </div>
</header>
<!--End Main Header -->