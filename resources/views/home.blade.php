<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photography Studio</title>
    <div class="mt-4">
    <a href="{{ route('portfolio') }}" class="btn btn-primary me-2">View Portfolio</a>
    <a href="{{ route('services') }}" class="btn btn-outline-primary me-2">Our Services</a>

    <a href="{{ route('testimonials') }}" class="btn btn-outline-info">Client Testimonials</a>
</div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Homepage</h1>

        
      
        <!-- Slideshow -->
        <div id="carouselExampleIndicators" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($featuredPhotos as $key => $photo)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $photo->filepath) }}" class="d-block w-100" alt="Featured Photo" style="height: 400px; object-fit: cover;">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        <!-- Intro -->
        <section class="text-center">
            <h2>About Us</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
           <a href="{{ url('/portfolio') }}" class="btn btn-primary">View Portfolio</a>
            <a href="{{  route('contact') }}" class="btn btn-outline-secondary">Contact Us</a>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>