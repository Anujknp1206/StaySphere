@extends('admin.dashboard.dashboard')
@section('content')

    <div class="container">
        <h2>Add New FAQ</h2>

        <form action="{{ route('faqs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Question</label>
                <input type="text" name="question" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Answer</label>
                <textarea name="answer" class="form-control" rows="4" required></textarea>
            </div>
            <button class="btn btn-success">Create</button>
        </form>
    </div>

@endsection