@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Manage Testimonials</h1>
            </div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card">
                <div class="card-body">
                    @if($testimonials->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ $testimonial->email }}</td>
                                        <td>{{ Str::limit($testimonial->message, 50) }}</td>
                                        <td>
                                            <span class="badge {{ $testimonial->status == 'approved' ? 'bg-success' : ($testimonial->status == 'pending' ? 'bg-warning' : 'bg-danger') }}">
                                                {{ ucfirst($testimonial->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $testimonial->created_at->format('M d, Y') }}</td>
                                        <td>
                                            @if($testimonial->status != 'approved')
                                                <!-- FIXED: Changed from admin.testimonials.approve to admin.testimonials.approve -->
                                                <form method="POST" action="{{ route('admin.testimonials.approve', $testimonial->id) }}" style="display: inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                </form>
                                            @endif
                                            
                                            @if($testimonial->status != 'rejected')
                                                <!-- FIXED: Changed from admin.testimonials.reject to admin.testimonials.reject -->
                                                <form method="POST" action="{{ route('admin.testimonials.reject', $testimonial->id) }}" style="display: inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No testimonials found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection