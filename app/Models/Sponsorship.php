<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function sponsorshipTypes()
    {
        return $this->belongsToMany(SponsorshipType::class, 'sponsorship_sponsorship_type', 'sponsorship_id', 'sponsorship_type_id');
    }
}
