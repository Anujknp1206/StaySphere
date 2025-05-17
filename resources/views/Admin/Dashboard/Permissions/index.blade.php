@extends('admin.dashboard.dashboard')

@section('content')
  <div class="card">
    <div class="card-header">
    <h3 class="card-title py-3">All Permissions</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <div style="margin-bottom: 10px;display:flex; flex-wrap: wrap; justify-content: end;" >

        <a href="{{ route('permissions.create') }}" class="btn btn-success">+ Add Permission</a>
      </div>
      <tr>
        <th>S.N.</th>
        <th>Permission Name</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($permissions as $index => $permission)
      <tr>
      <td>{{ $index + 1 }}</td>
      <td>{{ $permission->name }}</td>
      <td>
      <a href="{{ route('permissions.edit', $permission->id) }}" class="me-2">
        <i class="fa-solid fa-pen-to-square" style="color: #28a745;"></i>
      </a>

      <form action="{{ route('permissions.destroy', $permission->id) }}" data-confirm-delete="true" method="POST"
        style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" id="delete_permission_{{ $permission->id }}" name="delete_permission"
        style="background: none; border: none;">
        <i class="fa-solid fa-trash" style="color: #dc3545;"></i>
        </button>
      </form>
      </td>
      </tr>
    @endforeach
      </tbody>
    </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection