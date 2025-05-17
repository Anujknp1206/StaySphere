@extends('home.homelayouts.master')
@section('content')
    <!--Room Details Start-->
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1.5);
            background: #fff;
            border: 2px solid #AE7D54;
            ;
            padding: 20px;
            z-index: 9999;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
            border-radius: 3px;
            opacity: 0;
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
        }

        .popup.show {
            display: block;
            transform: translate(-50%, -50%) scale(1.5);
            opacity: 1;
        }

        .popup-content ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .popup-content li {
            color: #AE7D54;
            margin-bottom: 5px;
            font-weight: bold;
        }
    </style>

    @if ($errors->any())
        <div id="error-popup" class="popup show">
            <div class="popup-content">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <section class="blog-details pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 product-details rd-page">
                    <div class="bxslider">
                        @if ($room->images->count() == 0)
                            <p>Images Not Found</p>
                        @elseif($room->images->count() >= 1)
                            @php
                                $roomImages = $room->images;

                                // Ensure exactly 4 images, repeating as needed
                                if ($roomImages->count() < 4) {
                                    $repeatCount = ceil(4 / $roomImages->count());
                                    $roomImages = $roomImages->flatMap(fn($img) => collect(array_fill(0, $repeatCount, $img)))->take(4);
                                } else {
                                    $roomImages = $roomImages->take(4);
                                }
                            @endphp



                            @for ($i = 0; $i < 4; $i++)
                                <div class="slider-content">
                                    {{-- Main Image --}}
                                    <figure class="image-box">
                                        <a href="{{ asset('storage/' . $roomImages[$i]->image_url) }}" class="lightbox-image"
                                            data-fancybox="gallery">
                                            <img src="{{ asset('storage/' . $roomImages[$i]->image_url) }}"
                                                alt="Room Image {{ $i + 1 }}">
                                        </a>
                                    </figure>

                                    {{-- Thumbnails --}}
                                    <div class="slider-pager">
                                        <ul class="thumb-box">
                                            @foreach ($roomImages as $thumbIndex => $thumbImage)
                                                <li class="mb-0">
                                                    <a data-slide-index="{{ $thumbIndex }}" href="#"
                                                        class="{{ $thumbIndex == 0 ? 'active' : '' }}">
                                                        <figure>
                                                            <img src="{{ asset('storage/' . $thumbImage->image_url) }}"
                                                                alt="Thumb {{ $thumbIndex + 1 }}">
                                                        </figure>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endfor

                        @endif
                    </div>
                    <div class="room-details__left">
                        <div class="wrapper">
                            <h3>Description of Room</h3>

                            @php
                                $descriptionWords = explode(' ', $room->description);
                                $firstPart = implode(' ', array_slice($descriptionWords, 0, 60));
                                $secondPart = implode(' ', array_slice($descriptionWords, 60));
                            @endphp
                            <p class="text">{{ $firstPart }}</p>
                            <div class="row justify-content-center">
                                <div class="col-xl-12">
                                    <div class="room-details__content-right mb-40 mt-20">
                                        <div class="room-details__details-box">
                                            <div class="row">
                                                @foreach ($room->facilities->where('type', 'premium') as $feature)
                                                    @php
                                                        $parts = explode(':', $feature->name, 2);
                                                        $lbl = trim($parts[0]);
                                                        $value = trim($parts[1] ?? '');
                                                    @endphp

                                                    <div class="col-6 col-md-3">
                                                        <p class="text mb-0">{{ $lbl }}</p>
                                                        <h6>{{ $value }}</h6>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(!empty($secondPart))
                                <p class="text">{{ $secondPart }}</p>
                            @endif
                        </div>
                        <div class="mt-40">
                            <h4>Room Facilities</h4>
                            <div class="row room-facility-list mb-40">
                                @foreach ($room->facilities->where('type', 'standard') as $facility)
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="list-one d-flex align-items-center me-sm-4 mb-3">
                                            <div class="icon text-theme-color1 mr-10 flex-shrink-0">

                                                <i class="far {{ $facility->icon }}"></i>
                                            </div>
                                            <h6 class="title m-0">{{ $facility->name }}</h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__post mb-30">
                            <form id="contact_form2" name="contact_form" class="" action="{{ route('rooms.submit') }}"
                                method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Check In</label>
                                            <input id="checkin" name="checkin_date" class="form-control bg-white"
                                                type="date" placeholder="Arrive Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Check In</label>
                                            <input id="checkin" name="checkin_time" class="form-control bg-white"
                                                type="time" placeholder="Arrive Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Check Out</label>
                                            <input id="checkout" name="checkout_date" class="form-control bg-white"
                                                type="date" placeholder="Departure Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Check Out</label>
                                            <input id="checkout" name="checkout_time" class="form-control bg-white"
                                                type="time" placeholder="Departure Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Guests</label>
                                            <select class="form-select form-control bg-white" name="guest-select">
                                                <option selected disabled value="">Select</option>

                                                @php
                                                    $maxGuests = $room->max_guests ?? 1;
                                                    $displayLimit = $maxGuests;
                                                @endphp

                                                @for ($i = 1; $i <= min($displayLimit, $maxGuests); $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                                @if ($maxGuests > $displayLimit)
                                                    <option value="more">More</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{ $room->id }}">
                                <input type="hidden" name="room_number" value="{{ $room->room_number }}">
                                <input type="hidden" name="description" value="{{ $room->description }}">
                                <input type="hidden" name="price" value="{{ $room->price }}">
                                <input type="hidden" name="status" value="{{ $room->status }}">
                                <input type="hidden" name="room_type_id" value="{{ $room->room_type_id }}">
                                <div class="mb-3">
                                    <input name="form_botcheck" class="form-control" type="hidden" value="">
                                    <button type="submit" class="theme-btn btn-style-one w-100"
                                        data-loading-text="Please wait..."><span class="btn-title">Book
                                            Now</span></button>
                                </div>



                            </form>
                        </div>
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Compare Room</h3>

                            @foreach ($rooms as $compareRoom)
                                @if ($compareRoom->id !== $room->id  && $room->show_frontend)
                                    <ul class="sidebar__post-list list-unstyled">
                                        <li>
                                            <div class="sidebar__post-image">
                                                <img src="{{ url('/') }}/front/images/resource/news-info-1.jpg" alt="">
                                            </div>
                                            <div class="sidebar__post-content">
                                                <h3>
                                                    <span class="sidebar__post-content-meta">
                                                        <i class="fas fa-door-open"></i>{{ $compareRoom->room_number }}
                                                    </span>
                                                    @php
                                                        $formattedPrice = (fmod($compareRoom->price, 1) == 0)
                                                            ? number_format($compareRoom->price, 0)
                                                            : number_format($compareRoom->price, 2);
                                                    @endphp
                                                    <a href="{{ route('roomFacilities.book', $compareRoom->id) }}">
                                                        &#8377; &nbsp;{{ $formattedPrice }}/Night
                                                    </a>
                                                </h3>
                                            </div>
                                        </li>
                                    </ul>
                            
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        window.onload = function () {
            const popup = document.getElementById('error-popup');
            if (popup) {
                setTimeout(() => {
                    popup.classList.remove('show');
                }, 5000); // hides after 5 seconds
            }
        };
    </script>
@endsection
<!--Room Details End-->