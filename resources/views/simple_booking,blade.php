<!DOCTYPE html>
<html>
<head>
    <title>Book Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Book a Service</h1>
        
        @foreach($services as $service)
        <div class="card mb-3">
            <div class="card-body">
                <h3>{{ $service->name }}</h3>
                <p>Price: ${{ number_format($service->price, 2) }}</p>
                <button class="btn btn-primary">Book Now</button>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>