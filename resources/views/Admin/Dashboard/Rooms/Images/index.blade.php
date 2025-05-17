@extends('admin.dashboard.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Room Images</h3>
            <!-- Link to upload new images for the room -->
            <a href="{{ route('room-images.create', $room->id) }}" class="btn btn-success float-right">Upload New Images</a>
        </div>
        <div class="card-body">
            @if($images->isEmpty())
                <p>No images uploaded yet.</p>
            @else
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="{{ asset('storage/' . $image->image_url) }}" class="card-img-top" alt="Room Image"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <!-- Form for deleting an image -->
                                    <form action="{{ route('room-images.destroy', $image->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this image?');">
                                        @csrf
                                        @method('DELETE') <!-- Ensure the request is treated as DELETE -->
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <p class="mt-2"><strong>Room ID:</strong> {{ $image->room_id }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection