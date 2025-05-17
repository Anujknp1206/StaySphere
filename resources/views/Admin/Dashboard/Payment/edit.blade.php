@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
<div class="card">
    <div class="card-header"><h3>Edit Payment</h3></div>
    <div class="card-body">
        <form method="POST" action="{{ route('payments.update', $payment->id) }}">
            @csrf @method('PUT')

            <div class="form-group">
                <label>Amount</label>
                <input type="number" step="0.01" name="amount" class="form-control" value="{{ $payment->amount }}" required>
            </div>

            <div class="form-group">
                <label>Payment Method</label>
                <input type="text" name="payment_method" class="form-control" value="{{ $payment->payment_method }}" required>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="payment_status" class="form-control" required>
                    <option value="paid" {{ $payment->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="pending" {{ $payment->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="failed" {{ $payment->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
