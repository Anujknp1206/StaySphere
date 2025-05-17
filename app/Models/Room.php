<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Room extends Model
{
    protected $fillable = [
        'room_number',
        'room_type_id',
        'price',
        'description',
        'status',
        'max_guests', // e.g., available/booked
    ];


    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }
}