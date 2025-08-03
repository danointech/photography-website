<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'user_name',
        'user_email',
        'user_phone',
        'booking_date',
        'message',
        'status',
    ];

    protected $casts = [
        'booking_date' => 'date',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}