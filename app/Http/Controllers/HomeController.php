<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class HomeController extends Controller
{
    public function index()
    {
        // Get some featured photos for the slideshow (limit to 5)
        // For now, we'll get any photos, but you can add a 'featured' column later
        $featuredPhotos = Photo::take(5)->get();

        return view('home', compact('featuredPhotos'));
    }
}