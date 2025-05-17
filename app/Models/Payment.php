<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'amount',
        'payment_method',
        'transaction_id',
        'screenshot',
        'status',
        'first_name',
        'last_name',
        'email',
        'billing_address',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    // Relationship with Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // Status constants
    public const STATUS_SUCCESS = 'success';
    public const STATUS_FAILED = 'failed';
    public const STATUS_PENDING = 'pending';

    // Payment method constants
    public const METHOD_UPI = 'upi';
    public const METHOD_CARD = 'card';
    public const METHOD_NETBANKING = 'netbanking';
    public const METHOD_CASH = 'cash';
}