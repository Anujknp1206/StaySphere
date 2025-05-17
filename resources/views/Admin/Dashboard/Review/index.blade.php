@extends('admin.dashboard.dashboard')

@section('content')
  <div class="card">
    <div class="card-header">
    <h3 class="card-title py-3">All Reviews</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div style="margin-bottom: 10px; display: flex; flex-wrap: wrap; justify-content: end;">
      <a href="{{ route('reviews.create') }}" class="btn btn-success">+ Add Review</a>
    </div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>S.N.</th>
        <th>Customer</th>
        <th>Designation</th>
        <th>Details</th>
        <th>Photo</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($reviews as $index => $review)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $review->customer_name }}</td>
        <td>{{ $review->designation }}</td>
        <td>{{ Str::limit($review->details, 50) }}</td>
        <td>
        @if($review->photo)
      <img src="{{ asset('storage/' . $review->photo) }}" alt="Photo" width="60">
      @else
      N/A
      @endif
        </td>
        <td>
        <a href="{{ route('reviews.edit', $review->id) }}" class="me-2">
        <i class="fa-solid fa-pen-to-square" style="color: #28a745;"></i>
        </a>
        <form action="{{ route('reviews.destroy', $review->id) }}" data-confirm-delete="true" method="POST"
        style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" id="delete_review_{{ $review->id }}" name="delete_review"
        style="background: none; border: none;">
        <i class="fa-solid fa-trash" style="color: #dc3545;"></i>
        </button>
        </form>
        </td>
      </tr>
    @endforeach
      </tbody>
    </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection