@extends('home.homelayouts.master')
@section('content')

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- Team Slider Start -->
    <section class="team-details">
        <div class="swiper teamSwiper">
            <div class="swiper-wrapper">
                @foreach ($teams as $team)
                    <div class="swiper-slide">
                        <div class="container pt-120 pb-100">
                            <div class="team-details__top pb-70">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="team-details__top-left">
                                            <div class="team-details__top-img">
                                                <img src="{{ asset('storage/' . $team->photo) }}" alt="">
                                                <div class="team-details__big-text"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="team-details__top-right">
                                            <div class="team-details__top-content">
                                                <h3 class="team-details__top-name">{{ $team->name }}</h3>
                                                <p class="team-details__top-title">{{ $team->designation }}</p>
                                                <p class="team-details__top-text-1">{{ $team->intro }}</p>
                                                <div class="team-details-contact mb-30">
                                                    <h5 class="mb-0">Email Address</h5>
                                                    <div><span><a href="mailto:{{ $team->email }}">{{ $team->email }}</a></span>
                                                    </div>
                                                </div>
                                                <div class="team-details-contact mb-30">
                                                    <h5 class="mb-0">Phone Number</h5>
                                                    <div><span>{{ $team->phone }}</span></div>
                                                </div>
                                                <div class="team-details-contact">
                                                    <h5 class="mb-0">Web Address</h5>
                                                    <div><span>{{ $team->webaddress }}</span></div>
                                                </div>
                                                <div class="team-details__social">
                                                    <a href="{{ $team->twitter }}"><i class="fab fa-x-twitter"></i></a>
                                                    <a href="{{ $team->facebook }}"><i class="fab fa-facebook"></i></a>
                                                    <a href="{{ $team->facebook }}"><i class="fab fa-pinterest-p"></i></a>
                                                    <a href="{{ $team->instagram }}"><i class="fab fa-instagram"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-details__bottom pt-100">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="team-details__bottom-left">
                                            <h4 class="team-details__bottom-left-title">Personal Experience</h4>
                                            <p class="team-details__bottom-left-text">{{ $team->description }}</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="team-details__bottom-right">
                                            <div class="team-details__progress">
                                                <div class="team-details__progress-single">
                                                    <h4 class="team-details__progress-title">Professionalism</h4>
                                                    <div class="bar">
                                                        <div class="bar-inner count-bar"
                                                            data-percent="{{ $team->experience_professionalism }}%">
                                                            <div class="count-text">{{ $team->experience_professionalism }}%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="team-details__progress-single">
                                                    <h4 class="team-details__progress-title">Communication</h4>
                                                    <div class="bar">
                                                        <div class="bar-inner count-bar"
                                                            data-percent="{{ $team->experience_communication }}%">
                                                            <div class="count-text">{{ $team->experience_communication }}%</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="team-details__progress-single">
                                                    <h4 class="team-details__progress-title">Quality</h4>
                                                    <div class="bar marb-0">
                                                        <div class="bar-inner count-bar"
                                                            data-percent="{{ $team->experience_quality }}%">
                                                            <div class="count-text">{{ $team->experience_quality }}%</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="team-details__progress-single">
                                                    <h4 class="team-details__progress-title">Value</h4>
                                                    <div class="bar marb-0">
                                                        <div class="bar-inner count-bar"
                                                            data-percent="{{ $team->experience_value }}%">
                                                            <div class="count-text">{{ $team->experience_value }}%</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.container -->
                    </div> <!-- /.swiper-slide -->
                @endforeach
            </div> <!-- /.swiper-wrapper -->

            <!-- Navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Pagination dots -->
            <div class="swiper-pagination"></div>
        </div> <!-- /.swiper -->
    </section>
    <!-- Team Slider End -->

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Swiper Initialization -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let swiperEl = document.querySelector(".teamSwiper");
            let slideCount = parseInt(swiperEl.getAttribute('data-slide-count'));

            var swiper = new Swiper(".teamSwiper", {
                loop: slideCount > 1, // Only loop if more than 1 slide
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                slidesPerView: 1,
                spaceBetween: 30,
                effect: 'slide',
            });
        });
    </script>


@endsection