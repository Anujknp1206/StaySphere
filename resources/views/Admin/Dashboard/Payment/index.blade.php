@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>All Payments</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Booking ID</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>#{{ $payment->booking_id }}</td>
                            <td>${{ number_format($payment->amount, 2) }}</td>
                            <td>{{ $payment->payment_method }}</td>
                            <td>{{ $payment->payment_status }}</td>
                            <td>
                                <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this payment?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $payments->links() }}
        </div>
    </div>
@endsection