<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
  public function index()
{
    return view('portfolio', [
        'portfolio' => [
            'weddings' => ['ocean.jpg'],
            'portraits' => ['cat1.jpg', 'cat2.jpg', 'cat3.jpg']
        ]
    ]);
}

  public function create()
{
    return view('photos.create'); // This assumes you have a photos/create.blade.php view
}
}