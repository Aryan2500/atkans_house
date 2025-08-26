<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Influencer extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'instagram_profile',
        'followers',
        'other_social_media',
        'phone',
        'email',
        'interested_product',
        'status',
    ];
}
