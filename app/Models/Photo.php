<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filepath',      
        'title',         
        'filename',
        'category',
        'is_featured',
        'description'   
    ];

    // Rest of your model code...
}