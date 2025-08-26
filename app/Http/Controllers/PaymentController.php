<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Service\RazorpayService;
use Illuminate\Http\Request;

class PaymentController
{

    public $razorpay;
    /**
     * Display a listing of the resource.
     */

    public function __construct(RazorpayService $razorpay)
    {
        $this->razorpay = $razorpay;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $order = $this->razorpay->createOrder(500, 'ORDER123'); // ₹500
        return response()->json([
            'orderId' => $order['id'],
            'key' => config('services.razorpay.key')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function updatePaymentStatus(Order $order)
    {
        $order->update(['payment_status' => 'paid']);
        return response()->json(['success' => true, 'message' => 'Payment Sucessful']);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createOrder(Order $order)
    {
        $order = $this->razorpay->createOrder($order->total, $order->id . "ATKANS"); // ₹500
        return response()->json([
            'orderId' => $order['id'],
            'key' => config('services.razorpay.key')
        ]);
    }

    public function verify(Request $request)
    {
        $signature = hash_hmac(
            'sha256',
            $request->razorpay_order_id . "|" . $request->razorpay_payment_id,
            config('services.razorpay.secret')
        );

        if ($signature == $request->razorpay_signature) {
            return response()->json(['success' => true, 'message' => 'Payment verified']);
        }

        return response()->json(['success' => false, 'message' => 'Payment verification failed'], 400);
    }
}
