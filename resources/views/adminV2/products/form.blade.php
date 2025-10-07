@extends('adminV2.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('adminV2.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($product) ? 'Edit Product' : 'Add New Product' }}</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data"
                        action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}">
                        @csrf
                        @if (isset($product))
                            @method('PUT')
                        @endif

                        {{-- Type --}}
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select id="type" name="type" class="form-control" required onchange="changeType(this)">
                                <option value="">--Select--</option>
                                <option value="Skincare"
                                    {{ old('type', $product->type ?? '') == 'Skincare' ? 'selected' : '' }}>
                                    Skincare</option>
                                <option value="Clothing"
                                    {{ old('type', $product->type ?? '') == 'Clothing' ? 'selected' : '' }}>
                                    Clothing</option>
                                <option value="Magazines"
                                    {{ old('type', $product->type ?? '') == 'Magazines' ? 'selected' : '' }}>
                                    Magazines</option>
                                <option value="Online courses"
                                    {{ old('type', $product->type ?? '') == 'Online courses' ? 'selected' : '' }}>
                                    Online courses</option>
                                <option value="Show tickets"
                                    {{ old('type', $product->type ?? '') == 'Show tickets' ? 'selected' : '' }}>
                                    Show tickets</option>
                                <option value="Show participation passes"
                                    {{ old('type', $product->type ?? '') == 'Show participation passes' ? 'selected' : '' }}>
                                    Show participation passes</option>

                            </select>
                        </div>
                        {{-- Product Name --}}
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $product->name ?? '') }}" required>
                        </div>

                        {{-- Description --}}
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="3" required>{{ old('description', $product->description ?? '') }}</textarea>
                        </div>

                        {{-- Pricing --}}
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="price">Price</label>
                                <input type="number" step="0.01" name="price" class="form-control"
                                    value="{{ old('price', $product->price ?? '') }}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="discount_price">Discount Price</label>
                                <input type="number" step="0.01" name="discount_price" class="form-control"
                                    value="{{ old('discount_price', $product->discount_price ?? '') }}">
                            </div>
                            {{-- <div class="form-group col-md-4">
                                <label for="discount_percent">Discount %</label>
                                <input type="number" name="discount_percent" class="form-control"
                                    value="{{ old('discount_percent', $product->discount_percent ?? '') }}">
                            </div> --}}
                        </div>

                        {{-- Material --}}
                        <div class="form-group" id="materialDiv" style="display: none">
                            <label for="material">Material</label>
                            <input type="text" name="material" class="form-control"
                                value="{{ old('material', $product->material ?? '') }}">
                        </div>

                        {{-- Sizes --}}
                        <div class="form-group" id="sizesDiv" style="display: none">
                            <label for="sizes">Available Sizes</label>
                            <div class="d-flex flex-wrap">
                                @foreach ($sizes as $size)
                                    <div class="form-check mr-3">
                                        <input type="checkbox" name="sizes[{{ $size->id }}]" class="form-check-input"
                                            id="size_{{ $size->id }}"
                                            {{ isset($product) && $product->sizes->contains($size->id) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="size_{{ $size->id }}">
                                            {{ $size->name }} | {{ $size->number ?? 0 }}
                                        </label>
                                        <input type="number" name="stock[{{ $size->id }}]" placeholder="Stock"
                                            class="form-control form-control-sm mt-1"
                                            value="{{ isset($product) ? $product->sizes->find($size->id)?->pivot->stock : 0 }}">
                                    </div>
                                @endforeach
                            </div>

                            {{-- Shortcut to Add Size --}}
                            <button type="button" class="btn btn-sm btn-outline-primary mt-2" data-toggle="modal"
                                data-target="#addSizeModal">+ Add New Size</button>
                        </div>

                        {{-- Colors --}}
                        <div class="form-group" id="colorsDiv" style="display: none">
                            <label for="colors">Available Colors</label>
                            <div class="d-flex flex-wrap">
                                @foreach ($colors as $color)
                                    <div class="form-check mr-3">
                                        <input type="checkbox" name="colors[]" value="{{ $color->id }}"
                                            class="form-check-input" id="color_{{ $color->id }}"
                                            {{ isset($product) && $product->colors->contains($color->id) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="color_{{ $color->id }}">
                                            <span class="badge" style="background: {{ $color->hex_code ?? '#ccc' }}">
                                                {{ $color->name }}
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Shortcut to Add Color --}}
                            <button type="button" class="btn btn-sm btn-outline-primary mt-2" data-toggle="modal"
                                data-target="#addColorModal">+ Add New Color</button>
                        </div>

                        {{-- Images --}}
                        <div class="form-group">
                            <label for="images">Product Images</label>
                            <input type="file" name="images[]" class="form-control-file" multiple>
                            @if (isset($product) && $product->images->count())
                                <div class="mt-2">
                                    @foreach ($product->images as $img)
                                        <img src="{{ asset($img->image_url) }}" alt="" width="60"
                                            class="img-thumbnail mr-1">
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        {{-- Status --}}
                        {{-- <div class="form-check mb-3">
                            <input type="checkbox" name="is_active" class="form-check-input" id="is_active"
                                {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div> --}}

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="is_active" class="form-control" required>
                                <option value="1"
                                    {{ old('is_active', $product->is_active ?? '') == 1 ? 'selected' : '' }}>
                                    Active</option>
                                <option value="0"
                                    {{ old('is_active', $product->is_active ?? '') == 0 ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                        </div>

                        <button class="btn btn-success btn-block" type="submit">
                            {{ isset($product) ? '📝 Update Product' : '📥 Save Product' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal: Add New Size --}}
    <div class="modal fade" id="addSizeModal" tabindex="-1" role="dialog" aria-labelledby="addSizeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('sizes.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Size</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="name" class="form-control"
                            placeholder="Enter size (e.g. S, M, 40)" required>
                        <br>
                        <input type="text" name="number" class="form-control"
                            placeholder="Enter size  in Number (e.g. 32, 36, 40)">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Size</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal: Add New Color --}}
    <div class="modal fade" id="addColorModal" tabindex="-1" role="dialog" aria-labelledby="addColorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('colors.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Color</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="name" class="form-control" placeholder="Color Name (e.g. Red)"
                            required>
                        <input type="color" name="hex_code" class="form-control mt-2" value="#000000">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Color</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@push('scripts')
    {{-- JustValidate CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/just-validate@4.3.0/dist/just-validate.production.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const validation = new JustValidate('.needs-validation');

            validation
                .addField('[name="type"]', [{
                        rule: 'required',
                        errorMessage: 'Product type is required',
                    },
                    {
                        rule: 'minLength',
                        value: 2,
                        errorMessage: 'Name must be at least 2 characters',
                    },
                ])
                .addField('[name="name"]', [{
                        rule: 'required',
                        errorMessage: 'Product name is required',
                    },
                    {
                        rule: 'minLength',
                        value: 2,
                        errorMessage: 'Name must be at least 2 characters',
                    },
                ])
                .addField('[name="description"]', [{
                        rule: 'required',
                        errorMessage: 'Description is required',
                    },
                    {
                        rule: 'minLength',
                        value: 10,
                        errorMessage: 'Description must be at least 10 characters',
                    },
                ])
                .addField('[name="price"]', [{
                        rule: 'required',
                        errorMessage: 'Price is required',
                    },
                    {
                        rule: 'number',
                        errorMessage: 'Price must be a valid number',
                    },
                ])
                // .addField('[name="discount_percent"]', [{
                //     rule: 'number',
                //     errorMessage: 'Discount must be a number',
                // }, ])
                .addField('[name="is_active"]', [{
                    rule: 'required',
                    errorMessage: 'Please select product status',
                }, ])
                .onSuccess((event) => {
                    // Submit the form when validation passes
                    event.target.submit();
                });
        });
    </script>

    <script>
        function changeType(selectElement) {
            const value = selectElement.value;

            const colorsDiv = document.getElementById('colorsDiv');
            const sizesDiv = document.getElementById('sizesDiv');
            const materialDiv = document.getElementById('materialDiv');

            if (value === 'Clothing') {
                colorsDiv.style.display = 'block';
                sizesDiv.style.display = 'block';
                materialDiv.style.display = 'block';
            } else {
                colorsDiv.style.display = 'none';
                sizesDiv.style.display = 'none';
                materialDiv.style.display = 'none';
            }
        }
    </script>
@endpush
