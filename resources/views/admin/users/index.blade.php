@extends('admin.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">User Management</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">User Management</li>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role(s)</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name ?? '—' }}</td>
                                        <td>{{ $user->email ?? '—' }}</td>
                                        <td>{{ $user->rols->name ?? 'No Role' }}</td>

                                        <td>{{ $user->created_at->format('d M Y') }}</td>
                                        <td>
                                            {{-- <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-primary"
                                                title="View">
                                                <i class="fa fa-eye"></i>
                                            </a> --}}

                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-info"
                                                title="Edit">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            @if ($user->id != auth()->user()->id)
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this user?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3">
                            <a href="{{ route('user.create') }}" class="btn btn-success">
                                + Add New User
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
        initDataTable('#example', 'Users');
    </script>
@endpush
