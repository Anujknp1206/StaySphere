<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerProfile extends Model
{
    protected $fillable = [
        'client_id',
        'phone',
        'address',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
