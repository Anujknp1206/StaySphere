@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
<div class="container">
    <h2>Change Password</h2>
    <form method="POST" action="{{ route('profile.update-password') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" name="current_password" class="form-control" required>
            @error('current_password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Password</button>
    </form>
</div>
@endsection
