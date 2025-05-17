@extends('admin.dashboard.dashboardlayouts.master')


@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title py-3">All Permissions</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
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
                            <td>{{ $setting->_site_name }}</td>
                            <td>
                                @if($setting->logo)
                                    <img src="{{ asset('storage/photos/' . $setting->logo) }}" alt="Logo" width="80">
                                @else
                                    <span>No Logo</span>
                                @endif
                            </td>
                            <td>{{ $setting->office1 }}</td>
                            <td>{{ $setting->office2 }}</td>
                            <td>{{ $setting->address }}</td>
                            <td>{{ $setting->phone_no }}</td>
                            <td>{{$setting->website}}</a></td>
                            <td>{{$setting->facebook}}</a></td>
                            <td>{{$setting->instagram}}</a></td>
                            <td>{{$setting->linkedin}}</a></td>
                            <td>{{$setting->whatsapp}}</a></td>
                            <td>{{$setting->map_location}}</a></td>
                            <td>
                                <a href="{{ route('settings.edit', $setting->id) }}" class="btn-sm"><i
                                        class="fa-solid fa-pen-to-square" style="color: #28a745;"></i></a>

                                <form action="{{ route('settings.destroy', $setting->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none;"
                                        onclick="return confirm('Are you sure you want to delete this setting?')"><i
                                            class="fa-solid fa-trash" style="color: #dc3545;"></i></button>

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