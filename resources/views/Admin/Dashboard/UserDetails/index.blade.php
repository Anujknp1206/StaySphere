@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User List</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">

                <div style="margin-bottom: 10px;display:flex; flex-wrap: wrap; justify-content: end;">

                    <a href=" {{ route('users.create') }}" class="btn btn-success">+ Add New User</a>
                </div>
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Role</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>

                            <td>{{ $user->id }}</td>
                            <td>{{ $user->getRoleNames()->first() }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>@if($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="User Photo" width="80">
                            @endif
                            </td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="me-2">
                                    <i class="fa-solid fa-pen-to-square" style="color: #28a745;"></i>
                                </a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
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