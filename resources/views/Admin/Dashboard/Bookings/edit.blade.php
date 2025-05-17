@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title py-3">Edit Booking #{{ $booking->id }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="status">Booking Status</label>
                    <select name="status" class="form-control" required>
                        <option value="booked" {{ $booking->status === 'booked' ? 'selected' : '' }}>Booked</option>
                         <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="payment_status">Payment Status</label>
                    <select name="payment_status" class="form-control" required>
                        <option value="paid" {{ $booking->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>

                        <option value="failed" {{ $booking->payment_status === 'failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success mt-4">Update Booking</button>
            </form>
        </div>
    </div>
@endsection