@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Edit Room: {{ $room->room_number }}</h2>

        <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Room Number -->
            <div class="form-group">
                <label for="room_number">Room Number</label>
                <input type="text" name="room_number" id="room_number" class="form-control"
                    value="{{ old('room_number', $room->room_number) }}" required>
            </div>

            <!-- Room Type -->
            <div class="form-group">
                <label for="room_type_id">Room Type</label>
                <select name="room_type_id" id="room_type_id" class="form-control" required>
                    <option value="">Select Room Type</option>
                    @foreach($roomTypes as $type)
                        <option value="{{ $type->id }}" {{ old('room_type_id', $room->room_type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Price -->
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $room->price) }}"
                    required>
            </div>

            <!-- Status -->
            <div class="form-group">
                <label for="status">Room Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="available" {{ old('status', $room->status) == 'available' ? 'selected' : '' }}>Available
                    </option>
                    <option value="booked" {{ old('status', $room->status) == 'booked' ? 'selected' : '' }}>Booked</option>
                    <option value="maintenance" {{ old('status', $room->status) == 'maintenance' ? 'selected' : '' }}>
                        Maintenance</option>
                </select>
            </div>

            <!-- Max Guests -->
            <div class="form-group">
                <label for="max_guests">Max Guests</label>
                <input type="number" name="max_guests" id="max_guests" class="form-control"
                    value="{{ old('max_guests', $room->max_guests) }}" required>
            </div>

            <!-- Facilities -->
            <div class="form-group">
                <label>Facilities</label><br>
                @foreach($facilities as $facility)
                    <input type="checkbox" name="facility_ids[]" id="facility_{{ $facility->id }}" value="{{ $facility->id }}"
                        {{ in_array($facility->id, old('facility_ids', $room->facilities->pluck('id')->toArray())) ? 'checked' : '' }}>
                    <label for="facility_{{ $facility->id }}">{{ $facility->name }}</label><br>
                @endforeach
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Room Description</label>
                <textarea name="description" id="description" class="form-control"
                    required>{{ old('description', $room->description) }}</textarea>
            </div>

            <!-- Existing Images -->
            @if($room->images->count())
                <div class="form-group">
                    <label>Current Images:</label>
                    <div class="d-flex flex-wrap">
                        @foreach($room->images as $img)
                            <div class="m-2">
                                <img src="{{ asset('storage/' . $img->image_url) }}" alt="Room Image" width="150" height="100"
                                    style="object-fit: cover;">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Upload New Images -->
            <div class="form-group">
                <label for="images">Upload New Images (optional)</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Update Room</button>
        </form>
    </div>
@endsection
