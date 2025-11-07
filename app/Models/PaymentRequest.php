<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_link_id',
        'amount',
        'status',
        'date',
    ];

    public function paymentLink()
    {
        return $this->belongsTo(PaymentLink::class);
    }
}
