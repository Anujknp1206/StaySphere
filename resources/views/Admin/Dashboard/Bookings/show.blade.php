@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
    <div class="card">
        <h2>Booking Details</h2>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>User:</strong></td>
                        <td>{{ $booking->user->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Room:</strong></td>
                        <td>{{ $booking->room->room_number }}</td>
                    </tr>
                    <tr>
                        <td><strong>Check-in:</strong></td>
                        <td>{{ $booking->check_in }}</td>
                    </tr>
                    <tr>
                        <td><strong>Check-out:</strong></td>
                        <td>{{ $booking->check_out }}</td>
                    </tr>
                    <tr>
                        <td><strong>Guests:</strong></td>
                        <td>{{ $booking->number_of_guests }}</td>
                    </tr>
                    <tr>
                        <td><strong>Status:</strong></td>
                        <td>{{ $booking->status }}</td>
                    </tr>
                    <tr>
                        <td><strong>Payment Status:</strong></td>
                        <td>{{ $booking->payment_status }}</td>
                    </tr>
                </tbody>
            </table>

            <a href="{{ route('bookings.index') }}" class="btn btn-secondary mt-3">Back</a>
        </div>
    </div>
@endsection