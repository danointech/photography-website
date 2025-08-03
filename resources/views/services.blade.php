@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Our Photography Services</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($services->count() > 0)
        <div class="row">
            @foreach($services as $service)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text flex-grow-1">{{ $service->description }}</p>
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="text-primary mb-0">${{ number_format($service->price, 2) }}</h4>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $service->id }}">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Modal -->
                <div class="modal fade" id="bookingModal{{ $service->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Book {{ $service->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('book.service') }}" method="POST">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone (Optional)</label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Preferred Date</label>
                                        <input type="date" class="form-control" name="date" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Additional Message</label>
                                        <textarea class="form-control" name="message" rows="3" placeholder="Tell us about your photography needs..."></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit Booking Request</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            <h4>No Services Available</h4>
            <p>Please check back later or contact us directly for custom photography services.</p>
        </div>
    @endif
</div>
@endsection