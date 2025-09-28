<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    //

    protected $fillable = [
        'event_id',
        'rule_type',
        'value',
        'operator',
    ];
}
