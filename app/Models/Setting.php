<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        '_site_name',
        'logo',
        'logo_footer',
        'office1',
        'office2',
        'address',
        'phone_no',
        'website',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'slug',
        'email',
        'whatsapp',
        'map_location',
    ];
}
