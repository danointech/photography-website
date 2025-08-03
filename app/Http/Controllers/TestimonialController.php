<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        // Get approved testimonials (status = 'approved')
        $testimonials = Testimonial::where('status', 'approved')->latest()->get();
        return view('testimonials.index', compact('testimonials'));
    }
}