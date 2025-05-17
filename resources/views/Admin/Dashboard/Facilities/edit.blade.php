@extends('admin.dashboard.dashboard')

@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Facility</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('facilities.update', $facility->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="name">Facility Name</label>
          <input type="text" name="name" id="name" class="form-control" value="{{ $facility->name }}" required>
        </div>

        <div class="form-group">
          <label for="icon">FontAwesome Icon Class</label>
          <input type="text" name="icon" id="icon" class="form-control" value="{{ $facility->icon }}" required>
        </div>

        <div class="form-group">
          <label for="type">Type</label>
          <select name="type" id="type" class="form-control" required>
            <option value="standard" {{ $facility->type == 'standard' ? 'selected' : '' }}>Standard</option>
            <option value="premium" {{ $facility->type == 'premium' ? 'selected' : '' }}>Premium</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Facility</button>
      </form>
    </div>
  </div>
@endsection
