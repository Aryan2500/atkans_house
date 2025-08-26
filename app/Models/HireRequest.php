<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HireRequest extends Model

{
    //
    use HasFactory;

    protected $guarded = [];

    public function model()
    {
        return $this->belongsTo(ModelProfile::class, 'model_profile_id');
    }
}
