<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'dob',
        'firstName',
        'lastName',
        'location',
        'consent',
        'role',
        'phone',
        'email_verified_at',
        'phone_verified_at',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function modelProfile()
    {
        return $this->hasOne(ModelProfile::class, 'user_id');
    }

    public function rols()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function rampwalkApplications()
    {
        return $this->hasManyThrough(
            RampWalkApplication::class,
            ModelProfile::class,
            'user_id',      // Foreign key on ModelProfile table...
            'model_profile_id',     // Foreign key on RampWalkApplication table...
            'id',           // Local key on User table...
            'id'            // Local key on ModelProfile table...
        );
    }
}
