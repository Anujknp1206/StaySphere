@extends('admin.dashboard.dashboard')

@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Add New Facility</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('facilities.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Facility Name</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="icon">FontAwesome Icon Class</label>
          <input type="text" name="icon" id="icon" class="form-control" placeholder="fa-solid fa-bed" required>
        </div>

        <div class="form-group">
          <label for="type">Type</label>
          <select name="type" id="type" class="form-control" required>
            <option value="standard">Standard</option>
            <option value="premium">Premium</option>
          </select>
        </div>

        <button type="submit" class="btn btn-success">Add Facility</button>
      </form>
    </div>
  </div>
@endsection
