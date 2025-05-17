@extends('admin.dashboard.dashboard')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">All Users</h3>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Assigned Permissions</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $index => $user)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                @if($user->getAllPermissions()->count() > 0)
                  @foreach ($user->getAllPermissions() as $perm)
                    <span class="badge bg-info mb-1">{{ $perm->name }}</span>
                  @endforeach
                @else
                  <span class="text-muted">No permissions assigned</span>
                @endif
              </td>
              <td>
                <a href="{{ route('showPermissions', $user->id) }}" class="btn btn-success btn-sm" style="border:none; border-radius: 50%;">
                  <i class="fas fa-key"></i>
                </a>
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