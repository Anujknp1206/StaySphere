@extends('admin.dashboard.dashboard')
@section('content')
<div class="card">
    <div class="card-header"><h3>Edit Review</h3></div>
    <div class="card-body">
        <form action="{{ route('reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="form-group">
                <label>Customer Name</label>
                <input type="text" name="customer_name" value="{{ $review->customer_name }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Designation</label>
                <input type="text" name="designation" value="{{ $review->designation }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Review Details</label>
                <textarea name="details" class="form-control" rows="4" required>{{ $review->details }}</textarea>
            </div>
            <div class="form-group">
                <label>Photo</label><br>
                @if($review->photo)
                    <img src="{{ asset('storage/' . $review->photo) }}" alt="" width="100"><br>
                @endif
                <input type="file" name="photo" class="form-control mt-2">
            </div>
            <button class="btn btn-primary mt-2">Update Review</button>
        </form>
    </div>
</div>
@endsection
