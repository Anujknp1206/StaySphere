<<<<<<< HEAD
@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
<div class="container">
    <h1>Edit Team Member</h1>
    <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.dashboard.team.form', ['team' => $team])
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
=======
@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
<div class="container">
    <h1>Edit Team Member</h1>
    <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.dashboard.team.form', ['team' => $team])
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
>>>>>>> beab6d01e72f6bcc4bb8b316f62c92ba2ce4291b
