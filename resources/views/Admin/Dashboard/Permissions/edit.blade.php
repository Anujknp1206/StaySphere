<<<<<<< HEAD
@extends('admin.dashboard.dashboard')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Update Permission</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Permission</li>
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
            <div class="card-body">
              <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="name">Permission Name</label>
                  <input type="text" name="name" value="{{ $permission->name }}" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Update Permission</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
=======
@extends('admin.dashboard.dashboard')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit Permission</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">Permission Name</label>
            <input type="text" name="name" value="{{ $permission->name }}" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Update Permission</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
>>>>>>> beab6d01e72f6bcc4bb8b316f62c92ba2ce4291b
