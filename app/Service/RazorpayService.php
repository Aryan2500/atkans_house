<?php

namespace App\Service;

use Razorpay\Api\Api;

class RazorpayService
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
    }

    public function createOrder($amount, $receiptId)
    {
        return $this->api->order->create([
            'receipt'         => $receiptId,
            'amount'          => $amount * 100, // amount in paise (₹1 = 100p)
            'currency'        => 'INR',
            'payment_capture' => 1, // auto capture
        ]);
    }

    public function fetchPayment($paymentId)
    {
        return $this->api->payment->fetch($paymentId);
    }
}
