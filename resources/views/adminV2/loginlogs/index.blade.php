@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Login Logs</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Login Logs</li>
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
                        <table id="example" class="display table dataTable table-striped table-bordered"  data-title="Login Logs">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>IP Address</th>
                                    <th>Device</th>
                                    <th>OS</th>
                                    <th>Browser</th>
                                    <th>Login At</th>
                                    {{-- <th>Logout At</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loginLogs as $index => $log)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if ($log->user)
                                                <strong>{{ $log->user->name }}</strong><br>
                                                <small class="text-muted">{{ $log->user->email }}</small>
                                            @else
                                                <span class="text-muted">Deleted User</span>
                                            @endif
                                        </td>
                                        <td>{{ $log->ip_address ?? 'N/A' }}</td>
                                        <td>{{ $log->device ?? 'Unknown' }}</td>
                                        <td>{{ $log->os ?? 'Unknown' }}</td>
                                        <td>{{ $log->browser ?? 'Unknown' }}</td>
                                        <td>
                                            @if ($log->login_at)
                                                {{ \Carbon\Carbon::parse($log->login_at)->format('d M Y, h:i A') }}
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        {{-- <td>
                                            @if ($log->logout_at)
                                                {{ \Carbon\Carbon::parse($log->logout_at)->format('d M Y, h:i A') }}
                                            @else
                                                <span class="badge badge-primary">N/A</span>
                                            @endif
                                        </td> --}}
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
        initDataTable('#example', 'Login Logs');
    </script>
@endpush
