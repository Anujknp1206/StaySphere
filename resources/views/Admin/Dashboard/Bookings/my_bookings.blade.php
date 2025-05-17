@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h2 class="mb-4">{{ $title }}</h2>
        </div>
        @if($bookings->count())
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Room</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Total Amount</th>
                            <th>Payment Status</th>
                            <th>Booking Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $index => $booking)
                            <tr>
                                <td>{{ $index + $bookings->firstItem() }}</td>
                                <td>{{ $booking->room->room_number ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                                <td>₹{{ number_format($booking->total_amount, 2) }}</td>
                                <td>
                                    @if($booking->payments->isNotEmpty())
                                        <span class="badge bg-success">Paid</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @endif
                                </td>
                                <td>{{ $booking->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $bookings->links() }}
            </div>
        @else
            <div class="alert alert-info">No bookings found.</div>
        @endif
    </div>
@endsection