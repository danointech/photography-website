<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Photo Gallery</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        h1 { text-align: center; color: #333; }
        .gallery { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; margin-top: 30px; }
        .photo-card { border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .photo-card img { width: 100%; height: 200px; object-fit: cover; }
        .photo-info { padding: 15px; }
        .photo-title { font-weight: bold; margin-bottom: 5px; }
        .photo-category { color: #666; font-size: 14px; }
        .nav { text-align: center; margin-bottom: 20px; }
        .nav a { margin: 0 15px; text-decoration: none; color: #007cba; }
        .nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="nav">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('portfolio') }}">Portfolio</a>
        <a href="{{ route('services') }}">Services</a>
        <a href="{{ route('contact') }}">Contact</a>
        <a href="{{ route('testimonials') }}">Testimonials</a>
    </div>

    <h1>Our Portfolio</h1>
    
    @if($photos->count() > 0)
        <div class="gallery">
            @foreach($photos as $photo)
                <div class="photo-card">
                    <img src="{{ Storage::url($photo->filepath) }}" alt="{{ $photo->title }}">
                    <div class="photo-info">
                        <div class="photo-title">{{ $photo->title }}</div>
                        <div class="photo-category">{{ ucfirst($photo->category) }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p style="text-align: center; color: #666; margin-top: 50px;">
            No photos available yet. Please check back soon!
        </p>
    @endif
</body>
</html>