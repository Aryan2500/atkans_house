@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Roles</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Roles</li>
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
                                    <th>Role Name</th>
                                    <th>Permissions</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $index => $role)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @forelse ($role->permissions as $permission)
                                                <span class="badge badge-info mb-1">{{ $permission->display_name }}</span>
                                            @empty
                                                <span class="text-muted">No Permissions</span>
                                            @endforelse
                                        </td>
                                        <td>{{ $role->description ?? '—' }}</td>
                                        <td>{{ $role->created_at->format('d M Y') }}</td>
                                        <td>
                                            {{-- <a href="{{ route('role.show', $role->id) }}" class="btn btn-sm btn-primary"
                                                title="View">
                                                <i class="fa fa-eye"></i>
                                            </a> --}}

                                            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-sm btn-info"
                                                title="Edit">
                                                <i class="fa fa-pen"></i>
                                            </a>

                                            <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this role?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3">
                            <a href="{{ route('role.create') }}" class="btn btn-success">
                                + Add New Role
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
        initDataTable('#example', 'Roles');
    </script>
@endpush
