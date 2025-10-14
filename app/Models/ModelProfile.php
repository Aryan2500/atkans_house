<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelProfile extends Model
{
    //
    use HasFactory;

    protected $table = 'models';

    protected $fillable = [
        'user_id',
        'portfolio_path',
        'photo',
        'dob',
        'city',
        'state',
        'phone',
        'instagram_link',
        'height_cm',
        'weight_kg',
        'category',
        'status',
        'is_profile_completed',
        'is_featured'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rampWalkApplications()
    {
        return $this->hasMany(RampWalkApplication::class, 'model_profile_id');
    }

    public function hireRequests()
    {
        return $this->hasMany(HireRequest::class);
    }

    public function photos()
    {
        return $this->hasMany(ModelPhoto::class, 'model_profile_id');
    }
}
