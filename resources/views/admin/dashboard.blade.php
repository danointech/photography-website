<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .stats { display: flex; gap: 20px; margin: 20px 0; }
        .stat-box { border: 1px solid #ddd; padding: 20px; border-radius: 5px; }
        .stat-number { font-size: 24px; font-weight: bold; color: #333; }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    
    <div class="stats">
        <div class="stat-box">
            <div class="stat-number">{{ $stats['total_photos'] }}</div>
            <div>Total Photos</div>
        </div>
        <div class="stat-box">
            <div class="stat-number">{{ $stats['total_services'] }}</div>
            <div>Total Services</div>
        </div>
        <div class="stat-box">
            <div class="stat-number">{{ $stats['total_testimonials'] }}</div>
            <div>Total Testimonials</div>
        </div>
    </div>
</body>
</html>