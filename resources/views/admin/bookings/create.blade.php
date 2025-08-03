@extends('layouts.admin')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">
            <i class="fas fa-plus-circle me-2"></i>Create New Booking
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.bookings.store') }}" method="POST">
            @csrf
            <!-- Add your form fields here -->
            <div class="mb-3">
                <label class="form-label">Client Name</label>
                <input type="text" name="client_name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Save Booking
            </button>
        </form>
    </div>
</div>
@endsection