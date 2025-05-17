<!-- Main Footer -->
<footer class="main-footer footer-style-one">
  <!-- Widgets Section -->
  <div class="widgets-section">
    <div class="auto-container">
      <div class="row">
        <!-- Footer Column -->
        <div class="footer-column col-lg-4 col-sm-6">
          <div class="footer-widget about-widget wow fadeInLeft">
            <div class="widget-content">
              <div class="logo"><a href="#"> <img src="{{ url('/') }}/storage/photos/StaySphereT.png" alt=""
                    style=""></a></div>
              <div class="text mb-0">Feel free to reach out if you want collaborate with us, or simply chat.</div>
            </div>
          </div>

          <div class="footer-widget widget-social wow fadeInLeft" data-wow-delay="300ms">
            <h4 class="widget-title">Follow Us</h4>
            <div class="widget-content">
              <ul class="social-icon">
                <li><a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="{{ $setting->instagram }}"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="{{ $setting->linkedin }}"><i class="fa-brands fa-linkedin"></i></a></li>
                <li><a href="{{ $setting->whatsapp }}"><i class="fa-brands fa-whatsapp"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Footer Column -->
        <div class="footer-column col-lg-2 col-sm-6 mb-0 ps-xl-4">
          <div class="footer-widget links-widget ps-xl-4 wow fadeInLeft" data-wow-delay="200ms">
            <h4 class="widget-title">Company</h4>
            <div class="widget-content">
              <ul class="user-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('aboutus') }}">About Us</a></li>
                <li><a href="{{ route('roomList') }}">Services</a></li>
                <!-- <li><a href="#/">Career</a></li> -->
                <li><a href="{{ route('contactus') }}">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- footer column -->
        <div class="footer-column col-lg-3 col-sm-6" style="min-width: 35px;">
          <div class="footer-widget info-widget ps-xl-5 ms-xl-5 mb-30 wow fadeInLeft" data-wow-delay="300ms">
            <h4 class="widget-title">{{ $setting->office1 }}</h4>
            <div class="widget-content">
              <!-- Contact List -->
              <div class="contact-list">
                <div class="inner">
                  <div class="list-info">{{ $setting->address }}</div>
                  <div class="list-info">{{ $setting->phone_no }}</div>
                  <div class="list-info"><a href="" class="__cf_email__">{{ $setting->email }}</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--  Footer Bottom -->
  <div class="footer-bottom">
    <div class="auto-container">
      <div class="inner-container">
        <div class="copyright-text"> <strong>Copyright &copy; 2025 <span>{{ $setting->_site_name }}</span> Hotel</div>
      </div>
    </div>
  </div>
</footer>
<!--End Main Footer -->