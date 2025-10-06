<?php

namespace App\Http\Controllers;

use App\Mail\PaymentQrMail;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('items')->latest()->get();
        // dd($orders);
        return view('admin.orders.index', compact('orders'));
    }

    public function create(Request $request)
    {
        $product = Product::with(['images'])->findOrFail($request->product_id);

        // Resolve color and size objects instead of IDs
        $selectedColor = $request->color_id ? $product->colors->find($request->color_id) : null;
        $selectedSize  = $request->size_id ? $product->sizes->find($request->size_id) : null;

        // Calculate price (use discount if available)
        // $price = $product->discount_price ?? $product->price;

        // // Here we assume qty = 1 for "Buy Now"
        // $subtotal = $price;
        $discount = $product->discount_price ?? 0;
        $shipping = 40; // You can change logic
        $tax = 18; // Or calculate % wise

        $total = $product->price + $shipping + $tax;

        return view('public.checkout', compact(
            'product',
            'selectedColor',
            'selectedSize',
            // 'subtotal',
            'discount',
            'shipping',
            'tax',
            'total'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        try {

            $order = Order::create([
                'first_name' => $request->input('fname'),
                'last_name' => $request->input('lname'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'address2' => $request->input('address2'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'zip_code' => $request->input('zipcode'),
                // 'subtotal' => $request->input('subtotal', 0), // optional default
                'discount' => $request->input('discount', 0),
                'shipping' => $request->input('shipping', 0),
                'tax' => $request->input('tax', 0),
                'total' => $request->input('total', 0),
            ]);

            // Create one order item for now (single product case)
            $order->items()->create([
                'product_id' => $request->input('product_id'),
                'color_id' => $request->input('color_id'),
                'size_id' => $request->input('size_id'),
                'quantity' => $request->input('quantity', 1),
                'price' => $request->input('price', $request->input('total')),
            ]);

            $qrData = generateUpiQrBase64("9599269070@pthdfc",   $request->input('total'));
            // dd($qrData);

            // Convert Base64 to temp PNG file
            $qrPath = storage_path('app/public/qrcode_temp.png');
            file_put_contents($qrPath, base64_decode($qrData['base64']));

            Mail::to($request->input('email'))->send(
                new PaymentQrMail(
                    $qrPath,   // QR Base64
                    $qrData['upi_url'],  // UPI URL
                    $request->input('total'),                 // Amount
                    $request->input('fname')         // Customer name
                )
            );
            // dd($qr);



            return response()->json(['message' => 'Order placed successfully!', 'status' => true, 'orderId' => $order->id, 'qr' => "qr"], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'status' => false], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->status = $request->input('status');
        $order->payment_status = $request->input('payment_status');
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted!');
    }
}
