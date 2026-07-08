<<<<<<< HEAD
@extends('admin.dashboard.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Upload Room Images</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('room-images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="room_id">Select Room</label>
                <select name="room_id"  class="form-control" required>
                    <option value="{{ $room->id }}">{{$room->id}}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="images">Choose Images</label>
                <input type="file" name="images[]" class="form-control" multiple required>
            </div>

            <button type="submit" class="btn btn-success">Upload Images</button>
        </form>
    </div>
</div>
@endsection
=======
@extends('admin.dashboard.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Upload Room Images</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('room-images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="room_id">Select Room</label>
                <select name="room_id"  class="form-control" required>
                    <option value="{{ $room->id }}">{{$room->id}}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="images">Choose Images</label>
                <input type="file" name="images[]" class="form-control" multiple required>
            </div>

            <button type="submit" class="btn btn-success">Upload Images</button>
        </form>
    </div>
</div>
@endsection
>>>>>>> beab6d01e72f6bcc4bb8b316f62c92ba2ce4291b
