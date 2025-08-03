<!DOCTYPE html>
<html>
<head>
    <title>Edit Photo</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .form-group { margin: 15px 0; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 300px; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { background: #007cba; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
        .current-photo { margin: 20px 0; }
        .current-photo img { max-width: 200px; border: 1px solid #ddd; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Edit Photo</h1>
    
    <div class="current-photo">
        <h3>Current Photo:</h3>
        <img src="{{ asset('uploads/' . $photo->filename) }}" alt="{{ $photo->title }}">
    </div>
    
    <form action="/admin/photos/{{ $photo->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Photo Title:</label>
            <input type="text" id="title" name="title" value="{{ $photo->title }}" required>
        </div>
        
        <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="weddings" {{ $photo->category == 'weddings' ? 'selected' : '' }}>Weddings</option>
                <option value="portraits" {{ $photo->category == 'portraits' ? 'selected' : '' }}>Portraits</option>
                <option value="events" {{ $photo->category == 'events' ? 'selected' : '' }}>Events</option>
                <option value="commercial" {{ $photo->category == 'commercial' ? 'selected' : '' }}>Commercial</option>
            </select>
        </div>
        
        <button type="submit" class="btn">Update Photo</button>
    </form>
    
    <br>
    <a href="/admin/photos">← Back to Photos</a>
</body>
</html>