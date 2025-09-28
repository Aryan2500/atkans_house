<?php

// app/Models/Event.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'start_date',
        'end_date',
        'location',
        'venue_note',
        'hero_media_type',
        'hero_media_url',
        'milestone_id',
        'short_description',
        'brochure_url',
        'registration_deadline',
        'total_registered',
        'disclaimer',

        // Stats
        'models_count',

        'is_free_entry',
        'show_on_rampwalk_registration',
        'has_media_coverage',
        'has_on_site_hiring',
        'show_on_home_page',
        'event_stage'
    ];

    protected $casts = [
        'end_date' => 'datetime', // 👈 ensures it’s always Carbon
        'start_date' => 'datetime', // 👈 ensures it’s always Carbon
    ];

    public function rampWalkApplications()
    {
        return $this->hasMany(RampWalkApplication::class);
    }

    public function schedules()
    {
        return $this->hasMany(ShowSchedule::class);
    }

    public function scopeVisibleOnRampwalk($query)
    {
        return $query->where('show_on_rampwalk_registration', true);
    }

    public function milestone()
    {
        return $this->hasOne(Milestone::class ,'id', 'milestone_id');
    }
}
