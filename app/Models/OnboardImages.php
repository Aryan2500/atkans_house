<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnboardImages extends Model
{
    //

    protected $guarded = [];

    public function modelPhoto()
    {
        return $this->belongsTo(ModelPhoto::class, 'model_photo_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
