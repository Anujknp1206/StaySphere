@extends('admin.dashboard.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Rooms</h3>
            <div style="margin-bottom: 10px;display:flex; flex-wrap: wrap; justify-content: end;">

                <a href="{{ route('rooms.create') }}" class="btn btn-success">+ Add Room</a>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th><input type="checkbox" disabled></th>
                        <th>#</th>
                        <th>Room No</th>
                        <th>Room Type</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Max Guests</th>
                        <th>Images</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                        <td>
    <input type="checkbox"
           onchange="document.getElementById('toggle-form-{{ $room->id }}').submit()"
           {{ $room->show_frontend ? 'checked' : '' }}>
    <form id="toggle-form-{{ $room->id }}" action="{{ route('rooms.toggle', $room->id) }}" method="POST" style="display: none;">
        @csrf
        @method('PATCH')
    </form>
</td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $room->room_number }}</td>
                            <td>{{ $room->roomType->name }}</td>
                            <td>{{ $room->price }}</td>
                            <td>{{ ucfirst($room->status) }}</td>
                            <td>{{ $room->max_guests }}</td>
                            <td>{{ $room->images->count() }}</td>
                            <td>
                                <a href="{{ route('rooms.edit', $room->id) }}" class="me-2">
                                    <i class="fa-solid fa-pen-to-square" style="color: #28a745;"></i>
                                </a>

                                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none;">
                                        <i class="fa-solid fa-trash" style="color: #dc3545;"></i>
                                    </button>
                                </form>
                                <div class="form-group">

                                    <small><a href="{{ route('room-images.create',$room->id) }}">Upload
                                            Images</a></small>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection