<<<<<<< HEAD
@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
    <div class="container py-4">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">My Profile</h3>
            </div>

            <div class="card-body">
                <div class="row">

                    <!-- Profile Details -->
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th width="30%">Name</th>
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
                                    <td>{{ $user->gender ? ucfirst($user->gender) : 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <a href="{{ route('profile.edit') }}" class="btn btn-success">
                            Edit Profile
                        </a>
                    </div>

                    <!-- Profile Photo -->
                    <div class="col-md-4 text-center">

                        @if($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}" class="img-fluid rounded-circle border shadow"
                                style="width:220px;height:220px;object-fit:cover;" alt="Profile Photo">
                        @else
                            <img src="{{ asset('storage/' .'images/default-user.jpg') }}" class="img-fluid rounded-circle border shadow"
                                style="width:220px;height:220px;object-fit:cover;" alt="Default Photo">
                        @endif

                        <h5 class="mt-3">{{ $user->name }}</h5>
                        <p class="text-muted">{{ $user->email }}</p>

                    </div>

                </div>
            </div>
        </div>
    </div>
=======
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
>>>>>>> beab6d01e72f6bcc4bb8b316f62c92ba2ce4291b
@endsection