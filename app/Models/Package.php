<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //

    protected $fillable = ['name', 'price', 'features', 'status', 'type'];

    protected $casts = [
        'features' => 'array',
        'status' => 'boolean',
    ];

    public function bookings()
    {
        return  $this->hasMany(PhotoShootBooking::class);
    }

    public function sponsorship()
    {
        return  $this->hasMany(Sponsorship::class);
    }
}
