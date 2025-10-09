@extends('user.master')

@section('styles')
    <style>
        .order-card {
            background-color: #1a1d24;
            border: 1px solid #2c2626;
            border-radius: 12px;
            box-shadow: 0 8px 16px #07090d10;
            color: #fff;
            padding: 20px;
            margin-bottom: 25px;
            transition: 0.3s ease;
        }

        .order-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px #07090d30;
        }

        .order-header {
            border-bottom: 1px solid #2e2e2e;
            padding-bottom: 10px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .order-body {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .order-item {
            display: flex;
            align-items: center;
            flex: 1 1 300px;
            background-color: #21262d;
            border-radius: 10px;
            padding: 10px;
        }

        .order-item img {
            width: 70px !important;
            height: 70px !important;
            border-radius: 8px;
            object-fit: cover;
            margin-right: 15px;
            border: 1px solid #333;
        }

        .order-item .info {
            flex: 1;
        }

        .badge {
            font-size: 0.8rem;
            padding: 6px 10px;
            border-radius: 6px;
        }

        .order-footer {
            border-top: 1px solid #2e2e2e;
            margin-top: 15px;
            padding-top: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-3">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-white">Welcome, {{ Auth::user()->name ?? auth()->user()->firstName }}!</h3>
            <small class="text-muted">{{ now()->format('l, d M Y') }}</small>
        </div>

        <div class="row mb-5">
            @include('public.partials.alert')

            <h4 class="text-white mb-4">Your Orders</h4>
            @if ($bookings->isEmpty())
                <div class="text-center py-5">
                    <h5 class="text-muted">No Orders Found</h5>
                </div>
            @else
                @foreach ($bookings as $order)
                    <div class="col-3 mb-4">
                        <div class="order-card" style="border: 1px solid #E0E722;padding: 30px;">
                            <div class="order-header">
                                <div>
                                    <h6 class="mb-1">Order #{{ $order->id }}</h6>
                                    <small class="text-muted">Placed on
                                        {{ $order->created_at->format('d M Y, h:i A') }}</small>
                                </div>

                                @php
                                    $statusColors = [
                                        'pending' => 'warning',
                                        'paid' => 'success',
                                        'shipped' => 'info',
                                        'completed' => 'success',
                                        'cancelled' => 'danger',
                                    ];
                                @endphp

                                <span class="badge bg-{{ $statusColors[$order->status] ?? 'secondary' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>

                            <br>
                            <div class="order-body">
                                @foreach ($order->items as $item)
                                    <div class="order-item">
                                        <img src="{{ asset($item->product->images->first()->image_url ?? 'https://www.aaronfaber.com/wp-content/uploads/2017/03/product-placeholder-wp-95907_800x675.jpg') }} "
                                            style=" width: 145px; height: 145px;" alt="Product">

                                        <div class="info">
                                            <h6 class="mb-1">{{ $item->product->name ?? 'Unnamed Product' }}</h6>
                                            <small
                                                class="text-muted">{{ ucfirst($item->product->type ?? 'Unknown') }}</small>
                                        </div>


                                    </div>
                                @endforeach
                            </div>

                            <div class="order-footer">
                                <div>
                                    <span class="me-3">Payment:
                                        @if ($order->payment_status === 'paid')
                                            <span class="badge bg-success">Paid</span>
                                        @elseif ($order->payment_status === 'failed')
                                            <span class="badge bg-danger">Failed</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </span>
                                    <span>Total: <strong>₹{{ number_format($order->total, 2) }}</strong></span>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
