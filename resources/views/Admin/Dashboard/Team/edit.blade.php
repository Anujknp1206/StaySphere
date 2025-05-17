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
