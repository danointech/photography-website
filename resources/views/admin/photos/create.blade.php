<!DOCTYPE html>
<html>
<head>
    <title>Upload New Photo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .form-group { margin: 15px 0; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 300px; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        textarea { height: 100px; }
        .btn { background: #007cba; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
        .btn:hover { background: #005a8b; }
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>
    <h1>Upload New Photo</h1>
    
    <!-- FIXED: Changed from photos.store to admin.photos.store -->
    <form action="{{ route('admin.photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- ADDED: Error display -->
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="form-group">
            <label for="title">Photo Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        
        <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="">Select Category</option>
                <option value="weddings" {{ old('category') == 'weddings' ? 'selected' : '' }}>Weddings</option>
                <option value="portraits" {{ old('category') == 'portraits' ? 'selected' : '' }}>Portraits</option>
                <option value="events" {{ old('category') == 'events' ? 'selected' : '' }}>Events</option>
                <option value="commercial" {{ old('category') == 'commercial' ? 'selected' : '' }}>Commercial</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="photo">Choose Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn">Upload Photo</button>
            <!-- FIXED: Changed link to admin.photos.index -->
            <a href="{{ route('admin.photos.index') }}" style="margin-left: 10px; text-decoration: none; color: #666;">Cancel</a>
        </div>
    </form>
</body>
</html>