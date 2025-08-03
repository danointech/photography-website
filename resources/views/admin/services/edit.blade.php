@extends('layouts.admin')

@section('content')
<div class="card shadow border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h3 class="mb-0">
            <i class="fas fa-concierge-bell me-2"></i>Services Management
        </h3>
        <!-- FIXED: Changed from services.create to admin.services.create -->
        <a href="{{ route('admin.services.create') }}" class="btn btn-light btn-sm">
            <i class="fas fa-plus me-1"></i> Add New Service
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="80">ID</th>
                        <th>Service Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Created</th>
                        <th width="150" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                    <tr>
                        <td class="fw-bold">#{{ $service->id }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ Str::limit($service->description, 50) }}</td>
                        <td>
                            @if($service->price)
                                <span class="text-success fw-bold">${{ number_format($service->price, 2) }}</span>
                            @else
                                <span class="text-muted">Contact for price</span>
                            @endif
                        </td>
                        <td>
                            <small class="text-muted">{{ $service->created_at->format('M j, Y') }}</small>
                        </td>
                        <td class="text-end">
                            <div class="btn-group" role="group">
                                <!-- FIXED: Changed from services.show to admin.services.show -->
                                <a href="{{ route('admin.services.show', $service->id) }}"
                                    class="btn btn-sm btn-outline-primary"
                                   data-bs-toggle="tooltip" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <!-- FIXED: Changed from services.edit to admin.services.edit -->
                                <a href="{{ route('admin.services.edit', $service->id) }}"
                                    class="btn btn-sm btn-outline-success"
                                   data-bs-toggle="tooltip" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- FIXED: Changed from services.destroy to admin.services.destroy -->
                                <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                           data-bs-toggle="tooltip" title="Delete"
                                           onclick="return confirm('Are you sure you want to delete this service?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="fas fa-concierge-bell fa-2x mb-3"></i>
                            <p class="mb-0">No services found</p>
                            <p class="mb-0">
                                <!-- FIXED: Changed from services.create to admin.services.create -->
                                <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm mt-2">
                                    <i class="fas fa-plus me-1"></i> Add Your First Service
                                </a>
                            </p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection