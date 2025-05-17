@extends('admin.dashboard.dashboard')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Create Permission</h3>
      </div>
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
@endsection
