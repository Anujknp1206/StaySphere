@extends('admin.dashboard.dashboard')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Manage Permissions for {{ $user->name }}</h3>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.permissions.update', $user->id) }}">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label>Select Permissions:</label>
            <div class="row">
              @foreach($permissions as $permission)
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" 
                           name="permissions[]" 
                           value="{{ $permission->id }}"
                           id="perm_{{ $permission->id }}" 
                           {{ $user->hasPermissionTo($permission->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="perm_{{ $permission->id }}">
                      {{ $permission->name }}
                    </label>
                  </div>
                </div>
              @endforeach
            </div>
          </div>

          <button type="submit" class="btn btn-success mt-3">Update Permissions</button>
          <a href="{{ route('haspermissions') }}" class="btn btn-secondary mt-3">Back to Users</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection