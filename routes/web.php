<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;

// Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');

// Portfolio (use PortfolioController, not PhotoController)
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::post('/book-service', [ServiceController::class, 'book'])->name('book.service');

// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Testimonials Route
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');

// Bookings
Route::get('/services/{service}/book', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/book-services', [BookingController::class, 'index'])->name('bookings.index');
Route::post('/book-services', [BookingController::class, 'store'])->name('bookings.store');

// Authenticated User Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes (protected by admin middleware)
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    
    // Resource routes (these create all CRUD routes automatically)
    Route::resource('photos', App\Http\Controllers\Admin\PhotoController::class);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('bookings', App\Http\Controllers\Admin\BookingController::class)->only(['index', 'update']);
    
    // Testimonial admin routes
    Route::resource('testimonials', App\Http\Controllers\Admin\TestimonialController::class)->only(['index']);
    Route::patch('testimonials/{id}/approve', [App\Http\Controllers\Admin\TestimonialController::class, 'approve'])->name('testimonials.approve');
    Route::patch('testimonials/{id}/reject', [App\Http\Controllers\Admin\TestimonialController::class, 'reject'])->name('testimonials.reject');
});

require __DIR__.'/auth.php';

// Test routes
Route::get('/test', function () {
    return 'Laravel is working!';
});

Route::get('/admin/test', function() {
    return view('admin.test');
})->middleware(['admin']);

