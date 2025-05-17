@extends('home.homelayouts.master')
@section('content')
    <section class="about-section">
        <div class="auto-container">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-lg-6 order-lg-2 wow fadeInRight" data-wow-delay="600ms">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="sub-title style-two">About us</span>
                            <h2>We Provide Outdoor <br />Activities To All</h2>
                            <div class="text-2">Our activities around the world and across various Hotel Service
                                sectors.</div>
                            <div class="text">With over four decades of experience providing solutions to
                                large-scale enterprises throughout the globe, we offer end-to-end logistics tailored
                                for specific markets.</div>
                        </div>
                        <ul class="list-style-two">
                            <li><i class="icon fa fa-circle-check"></i> Introduce best the revauto and their
                                services.</li>
                            <li><i class="icon fa fa-circle-check"></i> Highlight featured on revauto project.</li>
                            <li><i class="icon fa fa-circle-check"></i> Revauto mission statement or philosophy.
                            </li>
                        </ul>
                        <div class="btn-box">
                            <a href="page-about.html" class="theme-btn btn-style-four"><span class="btn-title">Discover
                                    More</span></a>
                        </div>
                    </div>
                </div>
                <!-- Image Column -->
                <div class="image-column col-md-8 col-lg-6">
                    <div class="inner-column wow fadeInLeft">
                        <figure class="image-1 overlay-anim wow reveal-left tm-gsap-img-parallax overflow-hidden">
                            <img src="{{ url('/') }}/front/images/resource/about1-1.jpg" alt="">
                        </figure>
                        <figure class="image-2 overlay-anim wow reveal-left tm-gsap-img-parallax overflow-hidden">
                            <img src="{{ url('/') }}/front/images/resource/about1-2.jpg" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Emd About Section -->

    <!-- Marquee Section -->
    <section class="marquee-section pt-0">
        <div class="marquee marquee-style-one">
            <div class="marquee-group">
                <div class="text text-style2" data-text="BOOKING">Rooms & Suites</div>
                <span class="text divider "> <i class="icon fa-sharp fa-solid fa-star"></i> </span>
                <div class="text" data-text="TOUR">{{ $setting->_site_name }}</div>
                <span class="text divider "> <i class="icon fa-sharp fa-solid fa-star"></i> </span>
                <div class="text text-style2" data-text="ONLINE">Rooms & Suites</div>
                <span class="text divider "> <i class="icon fa-sharp fa-solid fa-star"></i> </span>
                <div class="text" data-text="PRE- BOOKING">{{ $setting->_site_name }}</div>
                <span class="text divider "> <i class="icon fa-sharp fa-solid fa-star"></i> </span>
            </div>
            <div class="marquee-group">
                <div class="text text-style2" data-text="BOOKING">Rooms & Suites</div>
                <span class="text divider "> <i class="icon fa-sharp fa-solid fa-star"></i> </span>
                <div class="text" data-text="TOUR">{{ $setting->_site_name }}</div>
                <span class="text divider "> <i class="icon fa-sharp fa-solid fa-star"></i> </span>
                <div class="text text-style2" data-text="ONLINE">Rooms & Suites</div>
                <span class="text divider "> <i class="icon fa-sharp fa-solid fa-star"></i> </span>
                <div class="text" data-text="PRE- BOOKING">{{ $setting->_site_name }}</div>
                <span class="text divider "> <i class="icon fa-sharp fa-solid fa-star"></i> </span>
            </div>
        </div>
    </section>
    <!--End Marquee Section -->

    <!-- Features Section Two -->
    <section class="feature-section-two pb-0">
        <div class="auto-container">
            <div class="row feature-row g-0">
                <div class="image-column col-lg-6">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image overlay-anim wow reveal-right"><img src="{{ url('/') }}/front/images/resource/feature2-1.jpg"
                                    alt=""></figure>
                        </div>
                    </div>
                </div>
                <div class="content-column col-lg-6">
                    <div class="inner-column">
                        <div class="content-box">
                            <div class="sec-title">
                                <span class="sub-title">DISCOVER</span>
                                <h2>The Restaurant</h2>
                                <div class="text">With the largest fleet of luxury catamarans, sailing and motor
                                    yachts in Santorini we guarantee the ultimate sailing experience!</div>
                            </div>
                            <a href="{{ route('roomList') }}" class="theme-btn btn-style-two read-more">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row feature-row g-0">
                <div class="content-column col-lg-6">
                    <div class="inner-column">
                        <div class="content-box">
                            <div class="sec-title">
                                <span class="sub-title">EXPERIENCE</span>
                                <h2>Spa Center</h2>
                                <div class="text">With the largest fleet of luxury catamarans, sailing and motor
                                    yachts in Santorini we guarantee the ultimate sailing experience!</div>
                            </div>
                            <a href="{{ route('roomList') }}" class="theme-btn btn-style-two read-more">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="image-column col-lg-6">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image overlay-anim wow reveal-left"><img src="{{ url('/') }}/front/images/resource/feature2-2.jpg"
                                    alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row feature-row g-0">
                <div class="image-column col-lg-6">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image overlay-anim wow reveal-right"><img src="{{ url('/') }}/front/images/resource/feature2-3.jpg"
                                    alt=""></figure>
                        </div>
                    </div>
                </div>
                <div class="content-column col-lg-6">
                    <div class="inner-column">
                        <div class="content-box">
                            <div class="sec-title">
                                <span class="sub-title">MODERN</span>
                                <h2>Fitness Center</h2>
                                <div class="text">With the largest fleet of luxury catamarans, sailing and motor
                                    yachts in Santorini we guarantee the ultimate sailing experience!</div>
                            </div>
                            <a href="{{ route('roomList') }}" class="theme-btn btn-style-two read-more">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Features Section -->

    <!-- Funfact Section -->
    <section class="funfact-section-two">
        <div class="outer-box">
            <div class="auto-container">
                <div class="fact-counter">
                    <div class="row">
                        <!-- Counter block-->
                        <div class="counter-block-two col-lg-3 col-sm-6">
                            <div class="inner-box">
                                <div class="count-box"><span class="count-text" data-speed="3000" data-stop="20">0</span>
                                </div>
                                <div class="counter-text">Years Of <br /> Experience</div>
                            </div>
                        </div>
                        <!-- Counter block-->
                        <div class="counter-block-two col-lg-3 col-sm-6">
                            <div class="inner-box">
                                <div class="count-box"><span class="count-text" data-speed="3000" data-stop="1">0</span>
                                </div>
                                <div class="counter-text">Online <br /> Booking</div>
                            </div>
                        </div>
                        <!-- Counter block-->
                        <div class="counter-block-two col-lg-3 col-sm-6">
                            <div class="inner-box">
                                <div class="count-box"><span class="count-text" data-speed="3000" data-stop="4">0</span>
                                </div>
                                <div class="counter-text">Experience <br /> Hotel Boy</div>
                            </div>
                        </div>
                        <!-- Counter block-->
                        <div class="counter-block-two col-lg-3 col-sm-6">
                            <div class="inner-box">
                                <div class="count-box"><span class="count-text" data-speed="3000" data-stop="0">0</span>
                                </div>
                                <div class="counter-text">Best Hotel <br /> Award</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Funfact Section -->
@endsection