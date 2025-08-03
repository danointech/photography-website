@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">
        <i class="fas fa-calendar-check me-2"></i>Bookings Management
    </h1>
    <span class="text-muted">Total: {{ $bookings->count() }}</span>
</div>

<div class="card shadow border-0">
    <div class="card-body">
        @if($bookings->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Client Name</th>
                            <th>Email</th>
                            <th>Service</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td class="fw-bold">#{{ $booking->id }}</td>
                            <td>{{ $booking->user_name }}</td>
                            <td>{{ $booking->user_email }}</td>
                            <td>{{ $booking->service->name ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('M j, Y') }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.bookings.update', $booking->id) }}" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $booking->id }}">
                                    <i class="fas fa-eye"></i> View
                                </button>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="modal{{ $booking->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Booking Details #{{ $booking->id }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Client:</strong> {{ $booking->user_name }}</p>
                                        <p><strong>Email:</strong> {{ $booking->user_email }}</p>
                                        <p><strong>Service:</strong> {{ $booking->service->name ?? 'N/A' }}</p>
                                        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($booking->booking_date)->format('M j, Y g:i A') }}</p>
                                        <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
                                        <p><strong>Created:</strong> {{ $booking->created_at->format('M j, Y g:i A') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No bookings found</h5>
                <p class="text-muted">Bookings will appear here when customers make reservations.</p>
            </div>
        @endif
    </div>
</div>
@endsection