<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'check_in',
        'check_out',
        'number_of_guests',
        'first_name',
        'last_name',
        'company_name',
        'email',
        'address',
        'more_address',
        'country',
        'state',
        'city',
        'zip_code',
        'order_notes',
        'room_price',
        'room_service',
        'total_amount',
        'duration_days',
        'status',
        'payment_status',
    ];

    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
        'room_price' => 'decimal:2',
        'room_service' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Relationship with Payments
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // Status constants
    public const STATUS_BOOKED = 'booked';
    public const STATUS_CANCELLED = 'cancelled';
    public const STATUS_COMPLETED = 'completed';

    // Payment status constants
    public const PAYMENT_STATUS_PAID = 'paid';
    public const PAYMENT_STATUS_UNPAID = 'unpaid';
    public const PAYMENT_STATUS_PENDING = 'pending';
}
