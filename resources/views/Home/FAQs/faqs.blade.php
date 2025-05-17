@extends('home.homelayouts.master')
@section('content')

<!-- FAQ Section -->
<section class="faqs-section-home1 mt-0 pt-120 pb-60 pb-md-20" style="background-image: url(images/background/1.html)">
    <div class="auto-container">
        <div class="row">
            @php
                $faqCount = count($faqs); // Total FAQs
                $half = ceil($faqCount / 2); // Half for splitting
            @endphp

            @if ($faqCount < 2)
                <!-- Single Column -->
                <div class="faq-column col-lg-12">
                    <div class="inner-column">
                        <ul class="accordion-box style-two wow fadeInLeft">
                            @foreach ($faqs as $index => $faq)
                                <li class="accordion block {{ $index === 0 ? 'active-block' : '' }}">
                                    <div class="acc-btn {{ $index === 0 ? 'active' : '' }}">{{ $faq['question'] }}
                                        <div class="icon fa fa-plus"></div>
                                    </div>
                                    <div class="acc-content {{ $index === 0 ? 'current' : '' }}">
                                        <div class="content">
                                            <div class="text">{{ $faq['answer'] }}</div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <!-- Two Columns -->
                <div class="faq-column col-lg-6">
                    <div class="inner-column">
                        <ul class="accordion-box style-two wow fadeInLeft">
                            @foreach ($faqs->slice(0, $half) as $index => $faq)
                                <li class="accordion block {{ $index === 0 ? 'active-block' : '' }}">
                                    <div class="acc-btn {{ $index === 0 ? 'active' : '' }}">{{ $faq['question'] }}
                                        <div class="icon fa fa-plus"></div>
                                    </div>
                                    <div class="acc-content {{ $index === 0 ? 'current' : '' }}">
                                        <div class="content">
                                            <div class="text">{{ $faq['answer'] }}</div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="faq-column col-lg-6">
                    <div class="inner-column mb-md-50">
                        <ul class="accordion-box style-two bg-transparent p-0 wow fadeInLeft">
                            @foreach ($faqs->slice($half) as $faq)
                                <li class="accordion block pl-30 pr-30">
                                    <div class="acc-btn border-bottom-0">{{ $faq['question'] }}
                                        <div class="icon fa fa-plus"></div>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content border-bottom-0 pt-0">
                                            <div class="text">{{ $faq['answer'] }}</div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection
