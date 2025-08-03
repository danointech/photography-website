@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">
                        <i class="fas fa-plus me-2"></i>Create New Service
                    </h3>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-outline-light btn-sm">
                        <i class="fas fa-arrow-left me-1"></i> Back to Services
                    </a>
                </div>

                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.services.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <label for="name" class="form-label required">Service Name</label>
                                    <input type="text" 
                                           class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           placeholder="e.g., Wedding Photography Package"
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="form-label required">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="6"
                                              placeholder="Describe what this service includes, what makes it special, and any important details..."
                                              required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Provide a detailed description of what this service includes.</div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="service-sidebar bg-light p-3 rounded">
                                    <h5 class="mb-3">Service Settings</h5>
                                    
                                    <div class="mb-4">
                                        <label for="price" class="form-label">Price (USD)</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" 
                                                   class="form-control @error('price') is-invalid @enderror" 
                                                   id="price" 
                                                   name="price" 
                                                   value="{{ old('price') }}" 
                                                   min="0" 
                                                   step="0.01"
                                                   placeholder="0.00">
                                        </div>
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">Leave empty if pricing varies or contact is required</div>
                                    </div>

                                    <div class="service-preview">
                                        <h6>Preview</h6>
                                        <div class="preview-card p-3 bg-white border rounded">
                                            <div class="preview-name fw-bold" id="preview-name">Service Name</div>
                                            <div class="preview-description text-muted small mt-1" id="preview-description">Service description will appear here...</div>
                                            <div class="preview-price text-success fw-bold mt-2" id="preview-price">Contact for pricing</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times me-1"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-save me-1"></i> Create Service
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.required::after {
    content: " *";
    color: #dc3545;
}

.service-sidebar {
    border: 1px solid #dee2e6;
    position: sticky;
    top: 20px;
}

.preview-card {
    border: 1px solid #dee2e6 !important;
}

.form-control:focus {
    border-color: #007cba;
    box-shadow: 0 0 0 0.2rem rgba(0, 124, 186, 0.25);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Live preview functionality
    const nameInput = document.getElementById('name');
    const descriptionInput = document.getElementById('description');
    const priceInput = document.getElementById('price');
    
    const previewName = document.getElementById('preview-name');
    const previewDescription = document.getElementById('preview-description');
    const previewPrice = document.getElementById('preview-price');
    
    nameInput.addEventListener('input', function() {
        previewName.textContent = this.value || 'Service Name';
    });
    
    descriptionInput.addEventListener('input', function() {
        const text = this.value || 'Service description will appear here...';
        previewDescription.textContent = text.length > 60 ? text.substring(0, 60) + '...' : text;
    });
    
    priceInput.addEventListener('input', function() {
        if (this.value && this.value > 0) {
            previewPrice.textContent = '$' + parseFloat(this.value).toFixed(2);
        } else {
            previewPrice.textContent = 'Contact for pricing';
        }
    });
});
</script>
@endsection