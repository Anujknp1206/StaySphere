<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon', 'type'];

    public function scopeStandard($query)
    {
        return $query->where('type', 'standard');
    }

    public function scopePremium($query)
    {
        return $query->where('type', 'premium');
    }
}
