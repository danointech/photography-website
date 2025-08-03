<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('admin.photos.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.photos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            // FIXED: Use Laravel's storage system instead of public_path
            $path = $request->file('photo')->store('photos', 'public');
            $filename = basename($path); // Extract just the filename
            
            Photo::create([
                'filename' => $filename,   // FIXED: Add filename field
                'filepath' => $path,       // Keep filepath too
                'title' => $request->title,
                'category' => $request->category,
            ]);
        }

        // FIXED: Use named route instead of hardcoded path
        return redirect()->route('admin.photos.index')->with('success', 'Photo uploaded successfully!');
    }

    public function show(Photo $photo)
    {
        return view('admin.photos.show', compact('photo'));
    }

    public function edit(Photo $photo)
    {
        return view('admin.photos.edit', compact('photo'));
    }

    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'title' => $request->title,
            'category' => $request->category,
        ];

        // FIXED: Handle photo update if new photo is uploaded
        if ($request->hasFile('photo')) {
            // Delete old photo if it exists
            if ($photo->filepath) {
                Storage::disk('public')->delete($photo->filepath);
            }
            
            // Store new photo
            $data['filepath'] = $request->file('photo')->store('photos', 'public');
        }

        $photo->update($data);

        // FIXED: Use named route instead of hardcoded path
        return redirect()->route('admin.photos.index')->with('success', 'Photo updated!');
    }

    public function destroy(Photo $photo)
    {
        // FIXED: Delete the actual file when deleting the record
        if ($photo->filepath) {
            Storage::disk('public')->delete($photo->filepath);
        }
        
        $photo->delete();
        
        // FIXED: Use named route instead of hardcoded path
        return redirect()->route('admin.photos.index')->with('success', 'Photo deleted!');
    }
}