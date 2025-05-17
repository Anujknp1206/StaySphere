@extends('admin.dashboard.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Room</h3>
        </div>
        <div class="card-body">
            <p style="color: red;">Images will be submited after room creation.</p>
            <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="room_number">Room Number</label>
                    <input type="text" name="room_number" class="form-control" value="{{ old('room_number') }}" required>
                </div>

                <div class="form-group">
                    <label for="room_type_id">Room Type</label>
                    <select name="room_type_id" class="form-control" required>
                        <option value="">-- Select Room Type --</option>
                        @foreach ($roomTypes as $roomType)
                            <option value="{{ $roomType->id }}" {{ old('room_type_id') == $roomType->id ? 'selected' : '' }}>
                                {{ $roomType->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="max_guests">Max Guests</label>
                    <input type="number" name="max_guests" id="max_guests" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Room Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="facility_ids">Facilities</label><br>
                    @foreach ($facilities as $facility)
                        <div class="form-check">
                            <input type="checkbox" name="facility_ids[]" value="{{ $facility->id }}" class="form-check-input"
                                id="facility_{{ $facility->id }}">
                            <label class="form-check-label" for="facility_{{ $facility->id }}">
                                {{ $facility->name }}

                            </label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success">Add Room</button>
            </form>
        </div>
    </div>
@endsection