<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Photo;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Photo::create([
        'filename'=> 'photo1.jpg',
        'title' => 'Prime X Ford',
        'category' => 'commercial'
        
     ]);

        Photo::create([
            'filename'=> 'photo2.jpg',
            'title' => 'Proffessional Portrait',
            'category' => 'portraits'
            
        ]);
        Photo::create([
            'filename'=> 'photo3.jpg',
            'title' => 'Event Capture',
            'category' => 'events'
            
        ]);
    }
}
