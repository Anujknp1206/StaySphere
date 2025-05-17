@extends('home.homelayouts.master')
@section('content')


    <!-- rooms-section -->
    <section class="rooms-section pb-100">
        <div class="auto-container">
            <div class="row">

                @foreach($rooms as $index => $room)


                    @if($room->status === 'available' && $room->show_frontend)
                        <div class="room-block  col-lg-6 col-md-6 mb-4">
                            <div class="inner-box wow fadeIn" data-wow-delay="{{ ($index + 1) * 100 }}ms">
                                @if(isset($room->images[1]))
                                    <div class="image-box">
                                        <figure class="image mb-0">
                                            <a href="{{ route('roomFacilities.book', $room->id) }}">
                                                <img id="room-image" src="{{ asset('storage/' . $room->images[0]->image_url) }}" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                @endif
                                <div class="content-box">
                                    <h6 class="title"><a
                                            href="{{ route('roomFacilities.show', $room->id) }}">{{ $room->room_number }}</a>
                                    </h6>

                                    <span class="price">&#8377; &nbsp;{{ $room->price }} / NIGHT</span>
                                </div>
                                <div class="box-caption">
                                    <a href="{{ route('roomFacilities.book', $room->id) }}" class="book-btn">book now</a>
                                    <ul class="bx-links">
                                        @foreach($room->facilities as $facility)
                                            <li><a href="{{ route('roomFacilities.book', $room->id) }}"><i
                                                        class=" fa {{ $facility->icon }}"></i></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
        </div>
    </section>
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