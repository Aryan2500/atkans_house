<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RampWalkApplication extends Model
{
    use HasFactory;

    protected $fillable = ['model_profile_id', 'event_id', 'status'];

    public function modelProfile()
    {
        return $this->belongsTo(ModelProfile::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
