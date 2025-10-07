@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><span class="h4 my-auto">Order Details</span></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Orders</li>
                    <li class="breadcrumb-item active">Order #{{ $order->id }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4">Order Summary</h4>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Customer Name:</strong>
                            <p>{{ $order->first_name }} {{ $order->last_name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Email:</strong>
                            <p>{{ $order->email }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Phone:</strong>
                            <p>{{ $order->phone }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Payment ID:</strong>
                            <p>{{ $order->payment_id ?? 'N/A' }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Status:</strong>
                            <p>
                                <span
                                    class="badge badge-{{ $order->status == 'paid' ? 'success' : ($order->status == 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Payment Status:</strong>
                            <p>
                                <span
                                    class="badge badge-{{ $order->payment_status == 'paid' ? 'success' : ($order->payment_status == 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Order Date:</strong>
                            <p>{{ $order->created_at->format('d M Y, h:i A') }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Total:</strong>
                            <p>₹{{ number_format($order->total, 2) }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Shipping:</strong>
                            <p>₹{{ number_format($order->shipping, 2) }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Discount:</strong>
                            <p>₹{{ number_format($order->discount, 2) }}</p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Tax:</strong>
                            <p>₹{{ number_format($order->tax, 2) }}</p>
                        </div>

                        <div class="col-md-12 mb-3">
                            <hr>
                            <h5>Shipping Address</h5>
                            <p>
                                {{ $order->address }}<br>
                                @if ($order->address2)
                                    {{ $order->address2 }}<br>
                                @endif
                                {{ $order->city }}, {{ $order->state }} - {{ $order->zip_code }}
                            </p>
                        </div>

                        <div class="col-md-12 mt-4 text-center">
                            <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                                Back to Orders
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
