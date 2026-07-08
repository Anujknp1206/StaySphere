<<<<<<< HEAD
@extends('admin.dashboard.dashboardlayouts.master')

@section('title', 'Add Team Member')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card card-success shadow-sm">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-user-plus mr-2"></i>
                        Add Team Member
                    </h3>
                </div>

                <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Please fix the following errors:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @include('admin.dashboard.team.form', ['team' => null])

                    </div>

                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('teams.index') }}" class="btn btn-secondary mr-2">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save mr-1"></i>
                            Save Team Member
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
@endsection
=======
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
>>>>>>> beab6d01e72f6bcc4bb8b316f62c92ba2ce4291b
