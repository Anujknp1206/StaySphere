@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                @if ($user->photo)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $user->photo) }}" width="100" alt="User Photo">
                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" id="delete_photo" name="delete_photo" value="1">
                            <label class="form-check-label" for="delete_photo">Delete current photo</label>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label for="photo">Profile Photo</label>
                    <input type="file" class="form-control" name="photo">
                    <img src="{{ asset('storage/' . $user->photo) }}" width="100" alt="User Photo">
                </div>
                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
@endsection