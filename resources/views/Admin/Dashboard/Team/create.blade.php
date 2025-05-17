@extends('admin.dashboard.dashboardlayouts.master')

@section('content')
<div class="container">
    <h1>Add Team Member</h1>
    <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.dashboard.team.form', ['team' => null])
        <button class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
