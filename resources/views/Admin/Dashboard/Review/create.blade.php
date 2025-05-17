@extends('admin.dashboard.dashboard')
@section('content')
<div class="card">
    <div class="card-header"><h3>Add Review</h3></div>
    <div class="card-body">
        <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Customer Name</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Designation</label>
                <input type="text" name="designation" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Review Details</label>
                <textarea name="details" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label>Photo (optional)</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <button class="btn btn-success mt-2">Save Review</button>
        </form>
    </div>
</div>
@endsection
