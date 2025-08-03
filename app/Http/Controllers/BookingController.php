<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
{
    $bookings = \App\Models\Booking::with('service')->get();
    return view('admin.bookings.index', compact('bookings'));
}
public function store(Request $request)
{
    $validated = $request->validate([
        'service_id' => 'required|exists:services,id',
        'user_name' => 'required|string|max:255',
        'user_email' => 'required|email',
        'user_phone' => 'required|string|max:20',
        'booking_date' => 'required|date|after:now',
        'message' => 'nullable|string',
        // 'status' is not included - it should be set server-side
    ]);

    // Add default status
    $validated['status'] = 'pending'; 

    Booking::create($validated);

    return back()->with('success', 'Booking request sent! We\'ll confirm shortly.');
}
}