<!DOCTYPE html>
<html>
<head>
    <title>View Photo - {{ $photo->title }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .photo-display { text-align: center; margin-bottom: 30px; }
        .photo-display img { max-width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); }
        .photo-info { background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        .info-row { display: flex; margin-bottom: 10px; }
        .info-label { font-weight: bold; width: 120px; color: #555; }
        .info-value { color: #333; }
        .actions { text-align: center; margin-top: 30px; }
        .btn { display: inline-block; padding: 10px 20px; margin: 0 10px; text-decoration: none; border-radius: 5px; font-weight: bold; }
        .btn-primary { background: #007cba; color: white; }
        .btn-success { background: #28a745; color: white; }
        .btn-secondary { background: #6c757d; color: white; }
        .btn-danger { background: #dc3545; color: white; border: none; cursor: pointer; }
        .btn:hover { opacity: 0.9; text-decoration: none; color: white; }
        h1 { color: #333; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Photo Details</h1>
        
        <div class="photo-display">
            <img src="{{ Storage::url($photo->filepath) }}" alt="{{ $photo->title }}">
        </div>
        
        <div class="photo-info">
            <div class="info-row">
                <span class="info-label">Title:</span>
                <span class="info-value">{{ $photo->title }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Category:</span>
                <span class="info-value">{{ ucfirst($photo->category) }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Filename:</span>
                <span class="info-value">{{ $photo->filename ?? 'N/A' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Upload Date:</span>
                <span class="info-value">{{ $photo->created_at->format('M d, Y - H:i') }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Last Updated:</span>
                <span class="info-value">{{ $photo->updated_at->format('M d, Y - H:i') }}</span>
            </div>
        </div>
        
        <div class="actions">
            <a href="{{ route('admin.photos.edit', $photo->id) }}" class="btn btn-success">
                ✏️ Edit Photo
            </a>
            <a href="{{ route('admin.photos.index') }}" class="btn btn-secondary">
                ← Back to Gallery
            </a>
            <form action="{{ route('admin.photos.destroy', $photo->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this photo?')">
                    🗑️ Delete Photo
                </button>
            </form>
        </div>
    </div>
</body>
</html>