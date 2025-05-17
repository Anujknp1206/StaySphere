<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'email',
        'phone',
        'webaddress',
        'designation',
        'twitter',
        'facebook',
        'instagram',
        'whatsapp',
        'intro',
        'description',
        'experience_communication',
        'experience_professionalism',
        'experience_quality',
        'experience_value',
    ];

    /**
     * Optionally cast numeric ratings as integers.
     */
    protected $casts = [
        'experience_communication' => 'integer',
        'experience_professionalism' => 'integer',
        'experience_quality' => 'integer',
        'experience_value' => 'integer',
    ];
}
