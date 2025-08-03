<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Booking;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }

    public function book(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'date' => 'required|date|after:today',
            'message' => 'nullable|string|max:1000',
        ]);

        try {
            // Create the booking - only with existing database columns
            $booking = Booking::create([
                'service_id' => $validated['service_id'],
                'user_name' => $validated['name'],
                'user_email' => $validated['email'],
                'booking_date' => $validated['date'],
                'status' => 'pending',
            ]);

            return redirect()->route('services')->with('success', 'Your booking request has been submitted successfully! We will contact you soon.');

        } catch (\Exception $e) {
            return redirect()->route('services')->with('error', 'There was an error submitting your booking. Please try again.');
        }
    }
}