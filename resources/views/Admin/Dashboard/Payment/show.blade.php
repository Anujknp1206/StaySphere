<<<<<<< HEAD
@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
<div class="card">
    <div class="card-header"><h3>Payment Detail</h3></div>
    <div class="card-body">
        <p><strong>Booking ID:</strong> {{ $payment->booking_id }}</p>
        <p><strong>Amount:</strong> ${{ number_format($payment->amount, 2) }}</p>
        <p><strong>Method:</strong> {{ $payment->payment_method }}</p>
        <p><strong>Status:</strong> {{ $payment->payment_status }}</p>
        <a href="{{ route('payments.index') }}" class="btn btn-primary">Back to list</a>
    </div>
</div>
@endsection
=======
@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
<div class="card">
    <div class="card-header"><h3>Payment Detail</h3></div>
    <div class="card-body">
        <p><strong>Booking ID:</strong> {{ $payment->booking_id }}</p>
        <p><strong>Amount:</strong> ${{ number_format($payment->amount, 2) }}</p>
        <p><strong>Method:</strong> {{ $payment->payment_method }}</p>
        <p><strong>Status:</strong> {{ $payment->payment_status }}</p>
        <a href="{{ route('payments.index') }}" class="btn btn-primary">Back to list</a>
    </div>
</div>
@endsection
>>>>>>> beab6d01e72f6bcc4bb8b316f62c92ba2ce4291b
