<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SponsorshipType  extends Model
{
    //
    protected $guarded = [];

    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class, 'sponsorship_sponsorship_type', 'sponsorship_type_id', 'sponsorship_id');
    }
}
