@extends('admin.dashboard.dashboard')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Permission</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Create Permission</li>
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
              <form action="{{ route('permissions.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name">Permission Name</label>
                  <input type="text" name="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Add Permission</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection