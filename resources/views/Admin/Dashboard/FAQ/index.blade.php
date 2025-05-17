@extends('admin.dashboard.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title py-3">All FAQ's</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <div style="margin-bottom: 10px;display:flex; flex-wrap: wrap; justify-content: end;">

                        <a href="{{ route('faqs.create') }}" class="btn btn-success">+ Add FAQ</a>
                    </div>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faqs as $faq)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $faq->question }}</td>
                            <td>{{ Str::limit($faq->answer, 50) }}</td>
                            <td>
                                <a href="{{ route('faqs.edit', $faq->id) }}" class="me-2">
                                    <i class="fa-solid fa-pen-to-square" style="color: #28a745;"></i>
                                </a>

                                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none;">
                                        <i class="fa-solid fa-trash" style="color: #dc3545;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection