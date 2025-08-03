<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index'); 
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|max:255', 
            'message' => 'required',
        ]);

        ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
           'subject' => $validated['subject'] ?? 'No Subject', 
            'message' => $validated['message'],
            'status' => 'unread'
        ]);

        return back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}