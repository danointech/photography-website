<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Photography Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-5">Our Work</h1>
        
        <!-- Wedding Category -->
        <section class="mb-5">
            <h2>Weddings</h2>
            <div class="row">
                @for($i = 1; $i <= 4; $i++)
                <div class="col-md-3 mb-4">
                    <div style="height:200px; background:#eee; display:grid; place-items:center;">
                        Wedding Photo {{ $i }}
                    </div>
                </div>
                @endfor
            </div>
        </section>

        <!-- Portrait Category -->
        <section class="mb-5">
            <h2>Portraits</h2>
            <div class="row">
               @foreach(['cat1.jpg', 'cat2.jpg', 'cat3.jpg', 'ocean.jpg'] as $image)
                <div class="col-md-3 mb-4">
                    <img src="{{ asset('storage/portfolio_images/' . $image) }}" 
                         class="img-fluid" 
                         style="height:200px; width:100%; object-fit:cover;"
                         alt="Portrait photo">
                </div>
                @endforeach
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>