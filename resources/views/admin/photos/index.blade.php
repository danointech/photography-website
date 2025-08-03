<!DOCTYPE html>
<html>
<head>
    <title>All Photos</title>
</head>
<body>
    <h1>Photo Gallery</h1>
    
    @if(session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif
    
    <!-- FIXED: Changed from photos.create to admin.photos.create -->
    <a href="{{ route('admin.photos.create') }}">Upload New Photo</a>
    
    <div class="photos">
    @foreach($photos as $photo)
        <div class="photo">
            <h3>{{ $photo->title }}</h3>
            
            <!-- FIXED: Using proper Storage URL -->
            <img src="{{ Storage::url($photo->filepath) }}" alt="{{ $photo->title }}" width="300">
            
            <p>Category: {{ $photo->category }}</p>
            
            <!-- ADDED: Edit and Delete buttons with correct admin routes -->
            <div style="margin-top: 10px;">
                <a href="{{ route('admin.photos.edit', $photo->id) }}" style="margin-right: 10px;">Edit</a>
                <form action="{{ route('admin.photos.destroy', $photo->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')" style="color: red;">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
    </div>
    
    <!-- ADDED: Back to Admin Dashboard link -->
    <div style="margin-top: 20px;">
        <a href="{{ route('admin.dashboard') }}">← Back to Admin Dashboard</a>
    </div>
</body>
</html>