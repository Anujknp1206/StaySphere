<<<<<<< HEAD
@extends('home.homelayouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Payment Cancelled') }}</div>

                    <div class="card-body">
                        <h3>{{ __('Your payment was cancelled.') }}</h3>
                        <p>{{ __('It looks like the payment process was not completed.') }}</p>

                        <p>{{ __('You can try again or contact support if you need assistance.') }}</p>

                        <a href="{{ route('cart.index') }}" class="btn btn-warning">{{ __('Go back to Cart') }}</a>
                        <a href="{{ route('home') }}" class="btn btn-primary">{{ __('Go to Home') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
=======
@extends('home.homelayouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Payment Cancelled') }}</div>

                    <div class="card-body">
                        <h3>{{ __('Your payment was cancelled.') }}</h3>
                        <p>{{ __('It looks like the payment process was not completed.') }}</p>

                        <p>{{ __('You can try again or contact support if you need assistance.') }}</p>

                        <a href="{{ route('cart.index') }}" class="btn btn-warning">{{ __('Go back to Cart') }}</a>
                        <a href="{{ route('home') }}" class="btn btn-primary">{{ __('Go to Home') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
>>>>>>> beab6d01e72f6bcc4bb8b316f62c92ba2ce4291b
@endsection