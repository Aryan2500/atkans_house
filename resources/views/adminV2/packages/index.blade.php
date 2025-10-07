@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Photography Packages</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Packages</li>
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
                        <table id="example" class="display table dataTable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Package Name</th>
                                    <th>Price (₹)</th>
                                    <th>Type</th>
                                    <th>Features</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $index => $package)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $package->name }}</td>
                                        <td>₹{{ $package->price }}</td>
                                        <td>{{ config('constant.package_type.' . $package->type, 'Unknown Type') }}
                                        </td>

                                        <td>
                                            @foreach ($package->features as $feature)
                                                <li>{{ trim($feature) }}</li>
                                            @endforeach
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $package->status ? 'success' : 'secondary' }}">
                                                {{ $package->status ? 'Active' : 'Inactive' }} {{ $package->status }}
                                            </span>
                                        </td>
                                        <td>{{ $package->created_at->format('d M Y') }}</td>
                                        <td>

                                            <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-sm btn-info"
                                                title="Edit">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <form action="{{ route('packages.destroy', $package->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this package?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3">
                            <a href="{{ route('packages.create') }}" class="btn btn-success">
                                + Add New Package
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
        initDataTable('#example', 'Packages');
    </script>
@endpush
