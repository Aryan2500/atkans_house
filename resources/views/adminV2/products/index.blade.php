@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Products</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                @include('admin.partials.alerts')

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="productsTable" class="display table dataTable table-striped table-bordered"
                            data-title="Products List">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Sizes</th>
                                    <th>Colors</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>

                                        {{-- Show primary image or fallback --}}
                                        <td>
                                            @if ($product->images->count() > 0)
                                                <img src="{{ asset($product->images->first()->image_url) }}"
                                                    alt="Product Image" width="60" height="60" class="img-thumbnail">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>

                                        <td>{{ $product->name }}</td>
                                        <td>₹{{ $product->price }}</td>
                                        <td>
                                            @if ($product->discount_price)
                                                ₹{{ $product->discount_price }}
                                                <small class="text-success">
                                                    ({{ $product->discount_percent }}% off)
                                                </small>
                                            @else
                                                <span class="text-muted">No Discount</span>
                                            @endif
                                        </td>

                                        {{-- Sizes with stock --}}
                                        <td>
                                            @foreach ($product->sizes as $size)
                                                <span class="badge bg-info">
                                                    {{ $size->name }} ({{ $size->pivot->stock }})
                                                </span>
                                            @endforeach
                                        </td>

                                        {{-- Colors --}}
                                        <td>
                                            @foreach ($product->colors as $color)
                                                <span class="badge"
                                                    style="background-color: {{ $color->hex_code ?? '#ccc' }}; color:#fff;">
                                                    {{ $color->name }}
                                                </span>
                                            @endforeach
                                        </td>

                                        <td>
                                            @if ($product->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>

                                        <td>{{ $product->created_at->format('d M Y') }}</td>

                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-sm btn-info" title="Edit">
                                                <i class="fa fa-pen"></i>
                                            </a>

                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3">
                            <a href="{{ route('products.create') }}" class="btn btn-success">
                                + Add New Product
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END: Card Data-->
@endsection

@push('scripts')
    <script>
        initDataTable('#productsTable', 'Products');
    </script>
@endpush
