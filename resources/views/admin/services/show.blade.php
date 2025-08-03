@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">
                        <i class="fas fa-eye me-2"></i>Service Details
                    </h3>
                    <div>
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-light btn-sm me-2">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="service-details">
                                <div class="detail-group mb-4">
                                    <label class="detail-label">Service Name</label>
                                    <h2 class="service-title">{{ $service->name }}</h2>
                                </div>

                                <div class="detail-group mb-4">
                                    <label class="detail-label">Description</label>
                                    <div class="service-description">
                                        {{ $service->description }}
                                    </div>
                                </div>

                                <div class="detail-group mb-4">
                                    <label class="detail-label">Price</label>
                                    <div class="service-price">
                                        @if($service->price)
                                            <span class="price-amount">${{ number_format($service->price, 2) }}</span>
                                        @else
                                            <span class="text-muted">Contact for pricing</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="service-meta bg-light p-3 rounded">
                                <h5 class="mb-3">Service Information</h5>
                                
                                <div class="meta-item mb-2">
                                    <strong>Service ID:</strong> #{{ $service->id }}
                                </div>
                                
                                <div class="meta-item mb-2">
                                    <strong>Created:</strong> {{ $service->created_at->format('M d, Y') }}
                                </div>
                                
                                <div class="meta-item mb-2">
                                    <strong>Last Updated:</strong> {{ $service->updated_at->format('M d, Y') }}
                                </div>
                                
                                <div class="meta-item">
                                    <strong>Status:</strong> 
                                    <span class="badge bg-success">Active</span>
                                </div>
                            </div>

                            <div class="mt-3">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-primary">
                                        <i class="fas fa-edit me-1"></i> Edit Service
                                    </a>
                                    
                                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100" 
                                                onclick="return confirm('Are you sure you want to delete this service?')">
                                            <i class="fas fa-trash me-1"></i> Delete Service
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.detail-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: #6c757d;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.5rem;
    display: block;
}

.service-title {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 0;
}

.service-description {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 0.375rem;
    border-left: 4px solid #007cba;
    font-size: 1.1rem;
    line-height: 1.6;
}

.price-amount {
    font-size: 2rem;
    font-weight: 700;
    color: #28a745;
}

.service-meta {
    border: 1px solid #dee2e6;
}

.meta-item {
    padding-bottom: 0.5rem;
    border-bottom: 1px solid #e9ecef;
}

.meta-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}
</style>
@endsection