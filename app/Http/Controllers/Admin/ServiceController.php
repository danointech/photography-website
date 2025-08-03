<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric|min:0'
        ]);

        Service::create($validated);

        // FIXED: Changed from services.index to admin.services.index
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

public function edit(Service $service) {
    $services = Service::all(); // Get all services
    return view('admin.services.edit', compact('service', 'services'));
}

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric|min:0'
        ]);

        $service->update($validated);

        // FIXED: Changed from services.index to admin.services.index
        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        // FIXED: Changed from services.index to admin.services.index
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
    }
}