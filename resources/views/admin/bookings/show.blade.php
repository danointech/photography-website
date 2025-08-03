@extends('layouts.admin')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white d-flex justify-content-between">
        <h3 class="mb-0">
            <i class="fas fa-calendar-alt me-2"></i>Booking #{{ $booking->id }}
        </h3>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-light btn-sm">
            <i class="fas fa-arrow-left me-1"></i> Back
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h5>Booking Details</h5>
                <p><strong>Client:</strong> {{ $booking->client_name }}</p>
                <p><strong>Date:</strong> {{ $booking->booking_date->format('F j, Y') }}</p>
                <p><strong>Status:</strong> 
                    <span class="badge bg-{{ $booking->status === 'confirmed' ? 'success' : 'warning' }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection