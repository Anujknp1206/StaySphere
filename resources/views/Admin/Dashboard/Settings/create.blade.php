@extends('admin.dashboard.dashboardlayouts.master')

@section('title', $title)

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Settings</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Settings List</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('settings.create') }}" class="btn btn-primary mb-3">Add New Settings</a>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered" id="settingsTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Office 1</th>
                                <th>Office 2</th>
                                <th>Address</th>
                                <th>Phone No</th>
                                <th>Website</th>
                                <th>Facebook</th>
                                <th>Instagram</th>
                                <th>LinkedIn</th>
                                <th>WhatsApp</th>
                                <th>Map Location</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($settings as $setting)
                                <tr>
                                    <td>{{ $setting->name }}</td>
                                    <td>
                                        @if($setting->logo)
                                            <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" width="80">
                                        @else
                                            <span>No Logo</span>
                                        @endif
                                    </td>
                                    <td>{{ $setting->office1 }}</td>
                                    <td>{{ $setting->office2 }}</td>
                                    <td>{{ $setting->address }}</td>
                                    <td>{{ $setting->phone_no }}</td>
                                    <td><a href="{{ $setting->website }}" target="_blank">Website</a></td>
                                    <td><a href="{{ $setting->facebook }}" target="_blank">Facebook</a></td>
                                    <td><a href="{{ $setting->instagram }}" target="_blank">Instagram</a></td>
                                    <td><a href="{{ $setting->linkedin }}" target="_blank">LinkedIn</a></td>
                                    <td><a href="{{ $setting->whatsapp }}" target="_blank">WhatsApp</a></td>
                                    <td><a href="{{ $setting->map_location }}" target="_blank">Map</a></td>
                                    <td>
                                        <a href="{{ route('settings.edit', $setting->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('settings.destroy', $setting->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this setting?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection