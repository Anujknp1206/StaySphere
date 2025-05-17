@extends('admin.dashboard.dashboard')

@section('content')
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3 class="card-title py-3">All Facilities</h3>
      <a href="{{ route('facilities.create') }}" class="btn btn-success">+ Add Facility</a>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Icon</th>
            <th>Type</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($facilities as $facility)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $facility->name }}</td>
              <td>
                @if ($facility->icon)
                  <i class="{{ $facility->icon }}" style="font-size: 24px;"></i>
                @else
                  No Icon
                @endif
              </td>
              <td>{{ ucfirst($facility->type) }}</td>
              <td>
                <a href="{{ route('facilities.edit', $facility->id) }}" class="me-2">
                  <i class="fa-solid fa-pen-to-square" style="color: #28a745;"></i>
                </a>
                <form action="{{ route('facilities.destroy', $facility->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Are you sure?')" style="background: none; border: none;">
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
