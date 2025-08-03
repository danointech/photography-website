<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Service;
class ServiceSeeder extends Seeder
{
    
    public function run()
    {
        Service::create([  //array 
            'name' => 'Commercial Photography',
            'description' => 'Professional photos that make your brand shine. Book your shoot today!',
            'price' => 2500.00,
        ]);

        Service::create([
            'name' => 'Portrait Photography',
            'description' => 'Get stunning portraits that reflect your personality and style.',
            'price' => 300.00,
        ]);

        Service::create([
            'name' => 'Event Photography',
            'description' => 'Professional photography for all types of events, ensuring every moment is captured.',
            'price' => 800.00,
        ]);
    }
}