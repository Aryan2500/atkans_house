@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Ramp Walk Applications</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Rampwalk</li>
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
                                    <th>Model Name</th>
                                    <th>Email</th>
                                    <th>Event</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Applied At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $index => $app)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $app->modelProfile->user->name ?? 'N/A' }}</td>
                                        <td>{{ $app->modelProfile->user->email ?? 'N/A' }}</td>
                                        <td>{{ $app->event->title ?? '—' }}</td>
                                        <td>{{ ucfirst($app->modelProfile->category ?? '-') }}</td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $app->status == 'approved' ? 'success' : ($app->status == 'pending' ? 'warning' : 'danger') }}">
                                                {{ ucfirst($app->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $app->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('ramp-applications.show', $app->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
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
    <!-- END: Card Data-->
@endsection

@push('scripts')
    <script>
        initDataTable('#example', 'Ramwalk-Applications');
    </script>
@endpush
