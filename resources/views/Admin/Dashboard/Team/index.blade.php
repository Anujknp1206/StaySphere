@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title py-3">All Team</h3>
                        <a href="{{ route('teams.create') }}" class="btn btn-success">+ Add Team Member</a>
                    </div>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Web Address</th>
                        <th>Designation</th>
                        <th>Intro</th>
                        <th>Description</th>
                        <th>Comm.</th>
                        <th>Prof.</th>
                        <th>Quality</th>
                        <th>Value</th>
                        <th>Twitter</th>
                        <th>Facebook</th>
                        <th>Instagram</th>
                        <th>WhatsApp</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <td>
                                @if($team->photo)
                                    <img src="{{ asset('storage/' . $team->photo) }}" width="50">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->email }}</td>
                            <td>{{ $team->phone }}</td>
                            <td><a href="{{ $team->webaddress }}" target="_blank">{{ $team->webaddress }}</a></td>
                            <td>{{ $team->designation }}</td>
                            <td>{{ $team->intro }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($team->description, 50) }}</td>
                            <td>{{ $team->experience_communication ?? '-' }}</td>
                            <td>{{ $team->experience_professionalism ?? '-' }}</td>
                            <td>{{ $team->experience_quality ?? '-' }}</td>
                            <td>{{ $team->experience_value ?? '-' }}</td>
                            <td><a href="{{ $team->twitter }}" target="_blank">Twitter</a></td>
                            <td><a href="{{ $team->facebook }}" target="_blank">Facebook</a></td>
                            <td><a href="{{ $team->instagram }}" target="_blank">Instagram</a></td>
                            <td><a href="https://wa.me/{{ $team->whatsapp }}" target="_blank">WhatsApp</a></td>
                            <td>
                                <a href="{{ route('teams.edit', $team->id) }}" class="me-2">
                                    <i class="fa-solid fa-pen-to-square" style="color: #28a745;"></i>
                                </a>
                                <form action="{{ route('teams.destroy', $team->id) }}" data-confirm-delete="true" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none;">
                                        <i class="fa-solid fa-trash" style="color: #dc3545;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection