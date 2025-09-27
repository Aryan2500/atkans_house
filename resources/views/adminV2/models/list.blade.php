@extends('admin.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Models</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Models</li>
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
                        <table id="example" class="display table dataTable table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>DOB</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Featured</th>
                                    <th>Registered At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $index => $model)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><img src="{{ asset($model->photo) }}" height="40" width="40"></td>
                                        <td>{{ $model->user->name ?? 'N/A' }}</td>
                                        <td>{{ $model->user->email ?? 'N/A' }}</td>

                                        <td>{{ \Carbon\Carbon::parse($model->dob)->format('d M Y') }}</td>
                                        <td>{{ $model->phone ?? 'N/A' }}</td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $model->status == 'approved' ? 'success' : ($model->status == 'pending' ? 'warning' : 'danger') }}">
                                                {{ ucfirst($model->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $model->is_featured == 1 ? 'success' : 'secondary' }}">
                                                {{ $model->is_featured == 1 ? 'Yes' : 'No' }}
                                            </span>
                                        </td>
                                        <td>{{ $model->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('models.show', $model->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            &nbsp;

                                            <a href="{{ route('models.edit', $model->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            &nbsp;

                                            <form action="{{ route('models.destroy', $model->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this model?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
@endsection
@push('scripts')
    <script>
        initDataTable('#example', 'Models');
    </script>
@endpush
