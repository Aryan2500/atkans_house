<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'address2',
        'city',
        'state',
        'zip_code',
        // 'subtotal',
        'discount',
        'shipping',
        'tax',
        'total',
        'payment_status',
        'status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
