@extends('adminV2.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('adminV2.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>Edit Order Status</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('orders.update', $order->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" class="form-control"
                                value="{{ $order->first_name }} {{ $order->last_name }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Order ID</label>
                            <input type="text" class="form-control" value="#{{ $order->id }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Order Total</label>
                            <input type="text" class="form-control" value="₹{{ number_format($order->total, 2) }}"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label>Order Status</label>
                            <select name="status" class="form-control" required>
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed
                                </option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Payment Status</label>
                            <select name="payment_status" class="form-control" required>
                                <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid
                                </option>
                                <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>Failed
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update Order</button>
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
