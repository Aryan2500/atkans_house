<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryContest extends Model
{
    //
    protected $fillable = [
        'username',
        'instagram_link',
        'photo',
        'is_active',
    ];
}
