<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    use HasFactory;


    protected $fillable = [
        'payment_reference',
        'payer_name',
        'payer_email',
        'amount',
        'payment_type',
        'related_id',
        'status',
        'method',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function hireRequest()
    {
        return $this->belongsTo(HireRequest::class, 'related_id')->where('payment_type', 'hire_request');
    }

    public function sponsorship()
    {
        return $this->belongsTo(Sponsorship::class, 'related_id')->where('payment_type', 'sponsorship');
    }
}
