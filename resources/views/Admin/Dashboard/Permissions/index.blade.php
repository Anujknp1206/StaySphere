@extends('admin.dashboard.dashboard')
@section('content')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>All Permissions</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">All Permissions</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <div style="margin-bottom: 10px;display:flex; flex-wrap: wrap; justify-content: end;">

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

                        <form action="{{ route('permissions.destroy', $permission->id) }}" data-confirm-delete="true"
                          method="POST" style="display:inline;">
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
        </div>
      </div>
    </div>
  </section>
@endsection