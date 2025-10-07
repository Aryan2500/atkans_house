@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Hire Requests</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Hire Requests</li>
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
                                    <th>Client Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Shoot Type</th>
                                    <th>Model</th>
                                    <th>Model Image</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hireRequests as $index => $request)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $request->client_name }}</td>
                                        <td>{{ $request->client_email }}</td>
                                        <td>{{ $request->client_phone }}</td>
                                        <td>{{ $request->shoot_type }}</td>
                                        {{-- Model Name --}}
                                        <td>
                                            @if ($request->model && $request->model->user)
                                                {{ $request->model->user->name }}
                                            @else
                                                <em>Not Available</em>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($request->model && $request->model->user && $request->model->photo)
                                                <img src="{{ asset($request->model->photo) }}" height="40"
                                                    width="40">
                                            @else
                                                <em>Not Available</em>
                                            @endif
                                        </td>
                                        <td>{{ $request->location }}</td>
                                        <td>{{ \Carbon\Carbon::parse($request->scheduled_date)->format('d M Y, h:i A') }}
                                        </td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $request->status === 'approved' ? 'success' : ($request->status === 'rejected' ? 'danger' : 'secondary') }}">
                                                {{ ucfirst($request->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('hireRequests.show', $request->id) }}"
                                                class="btn btn-sm btn-primary" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a> --}}

                                            {{-- <form action="{{ route('hireRequests.destroy', $request->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this request?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form> --}}

                                            {{-- Optional: Approve/Reject Buttons --}}
                                            @if ($request->status === 'pending' || $request->status === 'rejected')
                                                <form
                                                    action="{{ route('hireRequests.updateStatus', [$request->id, 'approved']) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-sm btn-success" title="Approve">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            @if ($request->status === 'pending' || $request->status === 'approved')
                                                <form
                                                    action="{{ route('hireRequests.updateStatus', [$request->id, 'rejected']) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-sm btn-warning" title="Reject">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            @endif
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
        initDataTable('#example', 'Hire Requests');
    </script>
@endpush
