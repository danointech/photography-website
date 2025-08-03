<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Photo Gallery</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 20px; 
            background-color: #f8f9fa;
        }
        h1 { 
            text-align: center; 
            color: #333; 
            margin-bottom: 10px;
        }
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-style: italic;
        }
        .nav { 
            text-align: center; 
            margin-bottom: 30px; 
            padding: 15px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .nav a { 
            margin: 0 15px; 
            text-decoration: none; 
            color: #007cba; 
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .nav a:hover { 
            background-color: #e3f2fd;
            text-decoration: none;
        }
        .categories {
            text-align: center;
            margin-bottom: 30px;
        }
        .category-btn {
            display: inline-block;
            margin: 5px;
            padding: 8px 16px;
            background: #007cba;
            color: white;
            text-decoration: none;
            border-radius: 20px;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .category-btn:hover {
            background: #005a8b;
            text-decoration: none;
            color: white;
        }
        .gallery { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); 
            gap: 20px; 
            margin-top: 30px; 
        }
        .photo-card { 
            background: white;
            border-radius: 12px; 
            overflow: hidden; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .photo-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }
        .photo-card img { 
            width: 100%; 
            height: 250px; 
            object-fit: cover; 
            cursor: pointer;
        }
        .photo-info { 
            padding: 15px; 
        }
        .photo-title { 
            font-weight: bold; 
            margin-bottom: 5px; 
            color: #333;
        }
        .photo-category { 
            color: #666; 
            font-size: 14px;
            background: #f0f0f0;
            padding: 4px 8px;
            border-radius: 12px;
            display: inline-block;
        }
        .empty-state {
            text-align: center;
            color: #666;
            margin-top: 80px;
            padding: 40px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .empty-icon {
            font-size: 48px;
            margin-bottom: 16px;
            color: #ddd;
        }
        
        /* Lightbox styles */
        .lightbox {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
        }
        .lightbox-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 90%;
            max-height: 90%;
        }
        .lightbox img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover {
            color: #bbb;
        }
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
    <p class="subtitle">Capturing life's most precious moments</p>
    
    @if($photos->count() > 0)
        <div class="categories">
            <a href="#" class="category-btn" data-category="all">All Photos</a>
            <a href="#" class="category-btn" data-category="weddings">Weddings</a>
            <a href="#" class="category-btn" data-category="portraits">Portraits</a>
            <a href="#" class="category-btn" data-category="events">Events</a>
            <a href="#" class="category-btn" data-category="commercial">Commercial</a>
        </div>
        
        <div class="gallery">
            @foreach($photos as $photo)
                <div class="photo-card" data-category="{{ $photo->category }}">
                    <img src="{{ Storage::url($photo->filepath) }}" 
                         alt="{{ $photo->title }}"
                         onclick="openLightbox('{{ Storage::url($photo->filepath) }}', '{{ $photo->title }}')">
                    <div class="photo-info">
                        <div class="photo-title">{{ $photo->title }}</div>
                        <span class="photo-category">{{ ucfirst($photo->category) }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <div class="empty-icon">📸</div>
            <h3>No photos available yet</h3>
            <p>Our amazing portfolio is coming soon! Please check back later to see our latest work.</p>
        </div>
    @endif

    <!-- Lightbox -->
    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
        <span class="close">&times;</span>
        <div class="lightbox-content">
            <img id="lightbox-img" src="" alt="">
        </div>
    </div>

    <script>
        // Category filtering
        document.querySelectorAll('.category-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const category = btn.dataset.category;
                
                // Update active button
                document.querySelectorAll('.category-btn').forEach(b => b.style.background = '#007cba');
                btn.style.background = '#005a8b';
                
                // Filter photos
                document.querySelectorAll('.photo-card').forEach(card => {
                    if (category === 'all' || card.dataset.category === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Lightbox functionality
        function openLightbox(src, title) {
            document.getElementById('lightbox').style.display = 'block';
            document.getElementById('lightbox-img').src = src;
            document.getElementById('lightbox-img').alt = title;
        }

        function closeLightbox() {
            document.getElementById('lightbox').style.display = 'none';
        }

        // Close lightbox on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });
    </script>
</body>
</html>