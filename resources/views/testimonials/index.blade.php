@extends('layouts.app')

@section('content')
<div class="container">
    <!-- DEBUG: Let's see what we have -->
    <p>Total testimonials: {{ $testimonials->count() }}</p>
    <p>Approved testimonials: {{ $testimonials->where('status', 'approved')->count() }}</p>
    
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-5">Client Testimonials</h1>
            
            @if($testimonials->count() > 0)
                <div class="row">
                    @foreach($testimonials as $testimonial)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <!-- DEBUG: Show raw data -->
                                <p><strong></strong> Name: {{ $testimonial->name ?? 'NULL' }}</p>
                                <p><strong></strong> Message: {{ $testimonial->message ?? 'NULL' }}</p>
                                <p><strong></strong> Status: {{ $testimonial->status ?? 'NULL' }}</p>
                                <hr>
                                
                                <blockquote class="blockquote mb-0">
                                    <p>"{{ $testimonial->message }}"</p>
                                    <footer class="blockquote-footer mt-3">
                                        <strong>{{ $testimonial->name }}</strong>
                                        @if($testimonial->email)
                                            <br><small class="text-muted">{{ $testimonial->email }}</small>
                                        @endif
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center">
                    <p class="lead">No testimonials available yet.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection