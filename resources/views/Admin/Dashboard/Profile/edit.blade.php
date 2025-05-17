@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Profile</h2>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" value="{{ old('dob', $user->dob) }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control">
                @if($user->photo)
                <p class="mt-2"><img src="{{ asset('storage/' . $user->photo) }}" width="100"></p>
                @endif
            </div>
            <div style="display:flex; justify-content: space-between;">
                <button type="submit" class="btn btn-success">Update Profile</button>
                <a href="{{ route('profile.change-password') }}" class="btn btn-warning">Change Password</a>

            </divstyle>
            
        </form>
    </div>
@endsection