@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Orders</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                @include('adminV2.partials.alerts')

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="ordersTable" class="display table dataTable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Total</th>
                                    <th>Product Type</th>
                                    <th>Order Item</th>
                                    <th>Status</th>
                                    <th>Payment</th>
                                    <th>Placed On</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>₹{{ number_format($order->total, 2) }}</td>
                                        <td>
                                            {{ optional(optional($order->items->first())->product)->type ?? 'N/A' }}
                                        </td>

                                        @if ($order->items->count() > 1)
                                            @foreach ($order->items as $item)
                                                <td>{{ $item->name }}</td>
                                            @endforeach
                                        @else
                                            <td>
                                                <div class="d-flex ">
                                                    <p>
                                                        {{ $order->items->first()->product ? $order->items->first()->product->name : 'N/A' }}
                                                    </p> &nbsp;
                                                    <img height="40" width="40"
                                                        src="{{ asset($order->items->first()->product ? $order->items->first()->product->images->first()->image_url : 'https://www.aaronfaber.com/wp-content/uploads/2017/03/product-placeholder-wp-95907_800x675.jpg') }}"
                                                        alt="" srcset="">
                                                </div>


                                            </td>
                                        @endif


                                        <td>
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
                                        </td>

                                        <td>
                                            @if ($order->payment_status === 'paid')
                                                <span class="badge bg-success">Paid</span>
                                            @elseif ($order->payment_status === 'failed')
                                                <span class="badge bg-danger">Failed</span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>

                                        <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>

                                        <td>
                                            <a href="{{ route('orders.show', $order->id) }}"
                                                class="btn btn-sm btn-info mt-2" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('orders.edit', $order->id) }}"
                                                class="btn btn-sm btn-warning mt-2" title="View">
                                                <i class="fa fa-pen"></i>
                                            </a>


                                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger mt-2"
                                                    onclick="return confirm('Are you sure you want to delete this order?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Optional Add New Order button if needed --}}
                        {{-- <div class="mt-3">
                            <a href="{{ route('orders.create') }}" class="btn btn-success">
                                + Add New Order
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card Data-->
@endsection

@push('scripts')
    <script>
        initDataTable('#ordersTable', 'Orders');
    </script>
@endpush
