<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Table name (optional if matches 'bookings')
    protected $table = 'bookings';

    // Fields that can be mass-assigned
    protected $fillable = [
        'customer_name',
        'service_type',
        'date',
        'status',
    ];
}
