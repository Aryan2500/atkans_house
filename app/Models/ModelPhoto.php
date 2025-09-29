<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPhoto extends Model
{
    //

    protected $fillable = ['model_profile_id', 'photo_path'];


    public function modelProfile()
    {
        return $this->belongsTo(ModelProfile::class);
    }
}
