<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Booking;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_photos' => Photo::count(),
            'total_services' => Service::count(),
            'total_testimonials' => Testimonial::count(),
            'total_bookings' => Booking::count(),
            'total_messages' => ContactMessage::count(),
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
}
