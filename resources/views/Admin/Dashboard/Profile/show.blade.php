@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
    <div class="container" style="padding:10px; ">
        <h2 class="mb-4">My Profile</h2>

        <div class="card p-4 shadow">


            <table class="table table-bordered" style="width:450px; display:flex;">
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>



                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $user->phone ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $user->address ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ $user->dob ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ ucfirst($user->gender) ?? 'N/A' }}</td>
                </tr>
                <div class="card" style="width:250px; padding: 20px;">



                    @if($user->photo)
                        <img style="display: flex; align-items: center; width:200px;  margin: 0px auto;" src="{{ asset('storage/' . $user->photo) }}"
                            alt="User Photo">
                    @else

                    @endif
                </div>
            </table>

            <div class="mt-3">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
@endsection