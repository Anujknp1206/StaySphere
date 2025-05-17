@extends('home.homelayouts.master')
@section('content')
    <div class="checkout-form-section-two">
        <div class="container">
            <div class="checkout-form">
                <div class="checkout-field">
                    <h4>Check-In</h4>
                    <div class="chk-field">
                        <input class="date-pick" type="date" placeholder="31 Dec 2025" />
                        <i class="fas fa-angle-down"></i>
                    </div>
                </div>
                <div class="checkout-field">
                    <h4>Check-Out</h4>
                    <div class="chk-field">
                        <input class="date-pick" type="date" placeholder="31 Dec 2025" />
                        <i class="fas fa-angle-down"></i>
                    </div>
                </div>
                <div class="checkout-field select-field br-0">
                    <h4>Guests</h4>
                    <div class="chk-field">
                        <select id="guest-select">
                            <option value="1" class="p-4 m-4">1 Guest</option>
                            <option value="2" class="p-4 m-4">2 Guests</option>
                            <option value="3" class="p-4 m-4">3 Guests</option>
                            <option value="4" class="p-4 m-4">4 Guests</option>
                        </select>
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <a href="{{ route('roomList') }}" class="theme-btn btn-style-one"><span class="btn-title">CHECK
                        <br />AVAILABILITY</span></a>
            </div>
        </div>
    </div>

    <!-- Service Section three -->
    <section class="service-section-three">
        <div class="auto-container">
            <div class="sec-title text-center">
                <span class="sub-title">What we offer</span>
                <h2>Get Our Special Offer.</h2>
            </div>
            <div class="outer-box">
                <div class="row">
                    <!-- service-block -->
                    <div class="service-block-three col-lg-4 col-md-6 wow fadeInUp">
                        <div class="inner-box">
                            <figure class="image"><img src="{{ url('/') }}/front/images/resource/service1-1.jpg" alt="">
                            </figure>
                            <div class="content-box">
                                <h6 class="title"><a href="room-details.html">Family Discount</a></h6>
                            </div>
                        </div>
                    </div>
                    <!-- service-block -->
                    <div class="service-block-three col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="inner-box">
                            <figure class="image"><img src="{{ url('/') }}/front/images/resource/service1-2.jpg" alt="">
                            </figure>
                            <div class="content-box">
                                <h6 class="title"><a href="room-details.html">Couples offer</a></h6>
                            </div>
                        </div>
                    </div>
                    <!-- service-block -->
                    <div class="service-block-three col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div class="inner-box">
                            <figure class="image"><img src="{{ url('/') }}/front/images/resource/service1-3.jpg" alt="">
                            </figure>
                            <div class="content-box">
                                <h6 class="title"><a href="room-details.html">Buy One Get One Free</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Service section -->
    <!-- About Section -->
    <section id="about" class="about-section-two pt-0">
        <div class="anim-icons">
            <img class="image-1" src="{{ url('/') }}/front/images/icons/icon-home1.png" alt="">
        </div>
        <div class="auto-container">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-lg-7 wow fadeInRight" data-wow-delay="600ms">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="sub-title style-three">LUXURY Sphere</span>
                            <h2>Explore Nature & Luxury <br />Like Never Before</h2>
                            <div class="text">
                                Escape the ordinary — indulge in world-class comfort, panoramic views, and thrilling outdoor
                                activities.
                                Whether it’s tranquility or adventure you seek, we bring the best of both worlds to your
                                stay.
                            </div>
                        </div>
                        <div class="outer-box">
                            <div class="info-block">
                                <div class="inner">
                                    <div class="icon-box"><i class="flaticon-light"></i></div>
                                    <h4 class="title">The Best <br />Lighting</h4>
                                </div>
                            </div>
                            <div class="info-block">
                                <div class="inner">
                                    <div class="icon-box"><i class="flaticon-pool"></i></div>
                                    <h4 class="title">The Best <br />Swiming</h4>
                                </div>
                            </div>
                        </div>
                        <ul class="list-style-two">
                            <li><i class="icon fa fa-circle-check"></i>Spacious, elegantly designed rooms with scenic
                                outdoor views</li>
                            <li><i class="icon fa fa-circle-check"></i>Experience nature through guided hikes, bonfires, and
                                adventure
                                tours</li>
                            <li><i class="icon fa fa-circle-check"></i>Relax in serenity with premium amenities and
                                personalized service
                            </li>
                        </ul>
                        <div class="btn-box">
                            <a href="" class="theme-btn btn-style-one"><span class="btn-title">Discover More</span></a>
                        </div>
                    </div>
                </div>
                <!-- Image Column -->
                <div class="image-column col-md-7 col-lg-5">
                    <div class="inner-column wow fadeInLeft">
                        <figure class="image-1 overlay-anim wow reveal-right"><img
                                src="{{ url('/') }}/front/images/resource/about2-1.jpg" alt=""></figure>
                        <figure class="image-2 overlay-anim wow reveal-right"><img
                                src="{{ url('/') }}/front/images/resource/about2-2.jpg" alt=""></figure>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Emd About Section -->
    <!-- Room-section two -->
    <section id="services" class="room-service-section pt-120 pb-60">
        <div class="auto-container">
            <div class="sec-title text-center">
                <span class="sub-title">CUSTOMER SERVICES</span>
                <h2>Book your stay and relax in luxury</h2>
            </div>
            <div class="row">
                <!-- News Block -->
                @forelse ($rooms as $index => $room)
                    @if ($index < 3 && $room->status === 'available' && $room->show_frontend)

                        <div class="room-service-block-one col-lg-4 col-sm-6 wow fadeInUp">
                            <div class="inner-box">
                                @if(isset($room->images[1]))
                                    <div class="image-box">
                                        <figure class="image mb-0">
                                            <a href="{{ route('roomFacilities.book', $room->id) }}">
                                                <img id="room-image" class="fade-image"
                                                    src="{{ asset('storage/' . $room->images[0]->image_url) }}" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                @endif
                                <div class="content-box">
                                    <div class="inner-box">
                                        <h4 class="title"><a
                                                href="{{ route('roomFacilities.book', $room->id) }}">{{$room->room_number}}</a></h4>
                                        @php
                                            $formattedPrice = (fmod($room->price, 1) == 0)
                                                ? number_format($room->price, 0)
                                                : number_format($room->price, 2);
                                          @endphp

                                        <div class="price">&#8377; &nbsp;{{$formattedPrice}}/ Night</div>


                                    </div>
                                    <div class="facilities-box align-items-center d-flex justify-content-between">
                                        <ul class="facilities-list">
                                            <li><i class="fal fa-circle-user me-2"></i> {{ $room->max_guests ?? 'N/A' }}
                                                Persons</li>
                                            <li><i class="fal fa-bed me-2"></i> {{ $room->bedType->name ?? 'N/A' }} </li>
                                        </ul>
                                        <ul class="facilities-list">
                                            @foreach($room->facilities as $index => $facility)
                                                @if ($index < 2)

                                                    <li><i class="fal {{ $facility->icon }} me-2"></i> {{ $facility->name }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-12 text-center py-5">
                        <h4>No rooms available yet.</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Testimonial Section Two -->
    <section id="testimonial" class="testimonial-section-two pt-0">
        <div class="anim-icons">
            <img class="image-1" src="{{ url('/') }}/front/images/icons/shape-5.png" alt="">
        </div>
        <div class="auto-container">
            <div class="row">
                <div class="testimonials overflow-hidden col-lg-12">
                    <!-- Testimonial Slider -->
                    <div class="swiper-container testimonial-slider-content">
                        <div class="swiper-wrapper">
                            <!-- Testimonial Block -->
                            @foreach ($reviews as $review)
                                <div class="testimonial-block-two swiper-slide">
                                    <div class="inner-box">
                                        <div class="quote-icon"><img class="icon-img"
                                                src="{{ url('/') }}/front/images/icons/testi-shape1.png" alt=""></div>
                                        <div class="text">{{ $review->details }}</div>
                                        <div class="info-box">
                                            <h5 class="name">{{ $review->customer_name }}</h5>
                                            <span class="designation">{{ $review->designation }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <!-- Testimonial Thumb -->
                    <div class="swiper-container testimonial-thumbs mx-auto">
                        <div class="swiper-wrapper">
                            @foreach ($reviews as $review)
                                <div class="swiper-slide"><img src="{{ asset('storage/' . $review->photo) }}" alt="" /></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Section Two -->
    <!-- End Room section -->
    <!-- Team Section -->
    <section id="team" class="team-section">
        <div class="anim-icons">
            <img class="image-1" src="{{ url('/') }}/front/images/icons/shape-15.png" alt="">
        </div>
        <div class="auto-container">
            <div class="sec-title text-center wow fadeInUp">
                <span class="sub-title">TEAM MEMBER</span>
                <h2>Check Out Our Experts <br />and Members</h2>
            </div>
            <div class="row">
                <!-- Team block -->
                @forelse ($teams->take(3) as $team)
                    <div class="team-block col-lg-3 col-sm-6">
                        <div class="inner-box wow fadeInLeft">
                            <div class="image-box">
                                <div class="inner-box">
                                    <figure class="image overlay-anim"><a href="{{ route('teamdetails', $team->id) }}"><img
                                                src="{{ asset('storage/' . $team->photo) }}" alt=""></a></figure>
                                </div>
                                <div class="info-box">
                                    <h4 class="name"><a href="">{{ $team->name }}</a></h4>
                                    <span class="designation">{{ $team->designation }}</span>
                                    <div class="social-links">
                                        <a href="{{ $team->facebook }}"><i class="fab fa-facebook"></i></a>
                                        <a href="{{ $team->twitter }}"><i class="fab fa-x-twitter"></i></a>
                                        <a href="{{ $team->linkedin }}"><i class="fab fa-linkedin"></i></a>
                                        <a href="{{ $team->youtube }}"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <h4>Details not available</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- End Team Section -->
    <!-- Funfact Section -->
    <section class="funfact-section">
        <div class="bg bg-image" style="background-image: url({{ url('/') }}/front/images/icons/bg-shape2.png);"></div>
        <div class="container">
            <div class="fact-counter">
                <div class="row">
                    <!-- Counter block-->
                    <div class="counter-block-one col-lg-3 col-sm-6">
                        <div class="inner-box">
                            <div class="count-box"><span class="count-text" data-speed="3000"
                                    data-stop="{{ $teamCount }}">0</span></div>
                            <div class="counter-text">Team Members</div>
                        </div>
                    </div>
                    <!-- Counter block-->
                    <div class="counter-block-one col-lg-3 col-sm-6">
                        <div class="inner-box">
                            <div class="count-box"><span class="count-text" data-speed="3000"
                                    data-stop="{{ $reviewCount }}">0</span></div>
                            <div class="counter-text">Customer Reviews</div>
                        </div>
                    </div>
                    <!-- Counter block-->
                    <div class="counter-block-one col-lg-3 col-sm-6">
                        <div class="inner-box">
                            <div class="count-box"><span class="count-text" data-speed="3000"
                                    data-stop="{{ $bookingCount }}">0</span></div>
                            <div class="counter-text">Booking</div>
                        </div>
                    </div>
                    <!-- Counter block-->
                    <div class="counter-block-one col-lg-3 col-sm-6">
                        <div class="inner-box">
                            <div class="count-box"><span class="count-text" data-speed="3000"
                                    data-stop="{{ $roomCount }}">0</span></div>
                            <div class="counter-text">Rooms</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Funfact Section -->

    <script>
        // Convert PHP array of image URLs to JavaScript
        const images = @json($room->images->pluck('image_url')->map(fn($url) => asset('storage/' . $url)));
        let currentIndex = 0;

        // Function to change the image
        function changeImage() {
            currentIndex = (currentIndex + 1) % images.length;
            document.getElementById('room-image').src = images[currentIndex];
        }
        // Change image every 5 seconds
        setInterval(changeImage, 5000);
    </script>
@endsection