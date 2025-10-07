@extends('adminV2.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('adminV2.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($hero) ? 'Edit Hero Image' : 'Add New Hero Image' }}</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data"
                        action="{{ isset($hero) ? route('hero.update', $hero->id) : route('hero.store') }}">
                        @csrf
                        @if (isset($hero))
                            @method('PUT')
                        @endif


                        {{-- Product Name --}}
                        <div class="form-group">
                            <label for="name">Hero Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $hero->name ?? '') }}" required>
                        </div>

                        {{-- Images --}}
                        <div class="form-group">
                            <label for="images">Hero Images</label>
                            <input type="file" name="image" class="form-control-file" multiple>
                            @if (isset($hero) && $hero->image)
                                <div class="mt-2">
                                    <img src="{{ asset($hero->image) }}" alt="" width="60"
                                        class="img-thumbnail mr-1">
                                </div>
                            @endif
                        </div>

                        {{-- Status --}}
                        {{-- <div class="form-check mb-3">
                            <input type="checkbox" name="is_active" class="form-check-input" id="is_active"
                                {{ old('is_active', $hero->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div> --}}

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="is_active" class="form-control" required>
                                <option value="1"
                                    {{ old('is_active', $hero->is_active ?? '') == 1 ? 'selected' : '' }}>
                                    Active</option>
                                <option value="0"
                                    {{ old('is_active', $hero->is_active ?? '') == 0 ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                        </div>

                        <button class="btn btn-success btn-block" type="submit">
                            {{ isset($hero) ? '📝 Update Hero' : '📥 Save Hero' }}
                        </button>
                    </form>
                </div>
            </div>
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
@endpush
