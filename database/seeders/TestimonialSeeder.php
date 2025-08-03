<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'name' => 'Sarah Johnson',
            'email' => 'sarah@email.com',
            'message' => 'Amazing photographer! Captured our wedding day perfectly. Every photo tells a story.',
            'status' => 'approved'
        ]);
        Testimonial::create([
            'name' => 'Mike Chen',
            'email' => 'mike@email.com',
            'message' => 'Professional and creative. ',
            'status' => 'approved'
        ]);
         Testimonial::create([
            'name' => 'Emma Davis',
            'email' => 'emma@email.com',
            'message' => 'Highly recommend!',
            'status' => 'pending'
        ]);

    }
}
