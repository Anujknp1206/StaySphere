<<<<<<< HEAD
@extends('admin.dashboard.dashboard')
@section('content')

    <div class="container">
        <h2>Edit FAQ</h2>

        <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Question</label>
                <input type="text" name="question" class="form-control" value="{{ $faq->question }}" required>
            </div>
            <div class="mb-3">
                <label>Answer</label>
                <textarea name="answer" class="form-control" rows="4" required>{{ $faq->answer }}</textarea>
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>

=======
@extends('admin.dashboard.dashboard')
@section('content')

    <div class="container">
        <h2>Edit FAQ</h2>

        <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Question</label>
                <input type="text" name="question" class="form-control" value="{{ $faq->question }}" required>
            </div>
            <div class="mb-3">
                <label>Answer</label>
                <textarea name="answer" class="form-control" rows="4" required>{{ $faq->answer }}</textarea>
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>

>>>>>>> beab6d01e72f6bcc4bb8b316f62c92ba2ce4291b
@endsection