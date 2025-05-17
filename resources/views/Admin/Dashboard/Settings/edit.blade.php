@extends('admin.dashboard.dashboardlayouts.master')


@section('title', $title)

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Settings</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Settings</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $setting->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control-file" id="logo" name="logo">
                    @if($setting->logo)
                        <br>
                        <img src="{{ asset('storage/' . $setting->logo) }}" width="100" alt="Current Logo">
                        <br>
                        <input type="checkbox" name="remove_logo" value="1"> Remove Logo
                    @endif
                </div>

                <div class="form-group">
                    <label for="office1">Office 1</label>
                    <input type="text" class="form-control" id="office1" name="office1" value="{{ old('office1', $setting->office1) }}">
                </div>

                <div class="form-group">
                    <label for="office2">Office 2</label>
                    <input type="text" class="form-control" id="office2" name="office2" value="{{ old('office2', $setting->office2) }}">
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address">{{ old('address', $setting->address) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="phone_no">Phone No</label>
                    <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{ old('phone_no', $setting->phone_no) }}">
                </div>

                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website" name="website" value="{{ old('website', $setting->website) }}">
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="url" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', $setting->facebook) }}">
                </div>

                <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input type="url" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $setting->instagram) }}">
                </div>

                <div class="form-group">
                    <label for="linkedin">LinkedIn</label>
                    <input type="url" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $setting->linkedin) }}">
                </div>

                <div class="form-group">
                    <label for="whatsapp">WhatsApp</label>
                    <input type="url" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $setting->whatsapp) }}">
                </div>

                <div class="form-group">
                    <label for="map_location">Map Location (Google Maps URL)</label>
                    <input type="url" class="form-control" id="map_location" name="map_location" value="{{ old('map_location', $setting->map_location) }}">
                </div>

                <button type="submit" class="btn btn-primary">Update Settings</button>
            </form>
        </div>
    </div>
</div>
@endsection