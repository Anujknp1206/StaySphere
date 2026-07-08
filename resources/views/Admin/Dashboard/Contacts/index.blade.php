
@extends('admin.dashboard.dashboardlayouts.master')
@section('content')
    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">
                    <i class="fas fa-envelope mr-2"></i>Contact Form Submissions
                </h3>
                <div class="ml-auto">
                    <span class="badge badge-primary">
                        Total: {{ $contacts->count() }}
                    </span>
                </div>
            </div>

            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                @endif

                @if($contacts->count())

                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="60">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th width="180">Submitted At</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            <strong>{{ $contact->name }}</strong>
                                        </td>

                                        <td>
                                            <a href="mailto:{{ $contact->email }}">
                                                {{ $contact->email }}
                                            </a>
                                        </td>

                                        <td>
                                            {{ $contact->phone ?: 'N/A' }}
                                        </td>

                                        <td>
                                            {{ $contact->subject ?: 'N/A' }}
                                        </td>

                                        <td>
                                            {{ Str::limit($contact->message, 60) }}
                                        </td>

                                        <td>
                                            {{ $contact->created_at->format('d M Y') }}
                                            <br>
                                            <small class="text-muted">
                                                {{ $contact->created_at->format('h:i A') }}
                                            </small>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                @else

                    <div class="text-center py-5">

                        <i class="fas fa-envelope-open-text fa-4x text-muted mb-3"></i>

                        <h4>No Contact Submissions Found</h4>

                        <p class="text-muted mb-0">
                            Contact form submissions will appear here once users start sending messages.
                        </p>

                    </div>

                @endif

            </div>
        </div>

    </div>
@endsection