@extends('home.homelayouts.master')

@section('content')
    <!-- Testimonial Section Five -->
    <section class="testimonial-section-five">
        <div class="auto-container">
            <div class="row">
                @if ($reviews->isEmpty())
                    <div class="container">
                        <p>Reviews Not Found</p>
                    </div>
                @else
                    @foreach ($reviews as $review)
                        <div class="testimonial-block-five col-lg-4 col-sm-6">
                            <div class="inner-box">
                                <div class="content-box">
                                    <span class="icon fa fa-quote-right"></span>
                                    <div class="text">{{ $review->details }}</div>
                                </div>
                                <div class="info-box">
                                    <figure class="thumb">
                                        <img src="{{ asset('storage/' . $review->photo) }}" alt="">
                                    </figure>
                                    <div>
                                        <span class="designation">{{ $review->designation }}</span>
                                        <div class="name">{{ $review->customer }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection