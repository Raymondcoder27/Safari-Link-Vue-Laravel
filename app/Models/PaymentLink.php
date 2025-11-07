<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'amount',
        'description',
        'url',
    ];

    public function paymentRequests()
    {
        return $this->hasMany(PaymentRequest::class);
    }
}
