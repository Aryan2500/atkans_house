@extends('adminV2.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('adminV2.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($role) ? 'Edit Role' : 'Add New Role' }}</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST"
                        action="{{ isset($role) ? route('role.update', $role->id) : route('role.store') }}">
                        @csrf
                        @if (isset($role))
                            @method('PUT')
                        @endif

                        <!-- Role Name -->
                        <div class="form-group mb-3">
                            <label for="name">Role System Name (e.g., admin, manager)</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $role->name ?? '') }}" required>
                        </div>

                        <!-- Description -->
                        <div class="form-group mb-3">
                            <label for="description">Description (optional)</label>
                            <textarea name="description" class="form-control" rows="2">{{ old('description', $role->description ?? '') }}</textarea>
                        </div>

                        <!-- Permissions Accordion -->
                        <div class="form-group">
                            <label>Assign Permissions</label>
                            <div id="permissionsAccordion">
                                @foreach ($permissionsGroups as $g)
                                    <div class="card mb-2">
                                        <div class="card-header d-flex justify-content-between align-items-center"
                                            id="heading_{{ $loop->index }}">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapse_{{ $loop->index }}" aria-expanded="false"
                                                    aria-controls="collapse_{{ $loop->index }}">
                                                    {{ $g->name }}
                                                </button>
                                            </h5>
                                            <div style="position: absolute; right:20px">
                                                <label for="">Select All</label>
                                                <input type="checkbox" class="group-checkbox"
                                                    data-group="group_{{ $loop->index }}">
                                            </div>

                                        </div>

                                        <div id="collapse_{{ $loop->index }}" class="collapse show"
                                            aria-labelledby="heading_{{ $loop->index }}"
                                            data-parent="#permissionsAccordion">
                                            <div class="card-body row">
                                                {{-- @dd($g->permissions) --}}
                                                @foreach ($g->permissions as $permission)
                                                    <div class="col-md-4">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input permission-checkbox"
                                                                type="checkbox" name="permissions[]"
                                                                value="{{ $permission->id }}"
                                                                id="perm_{{ $permission->id }}"
                                                                data-group="group_{{ $loop->parent->index }}"
                                                                {{ (isset($role) && $role->permissions->contains($permission->id)) || (is_array(old('permissions')) && in_array($permission->id, old('permissions', []))) ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="perm_{{ $permission->id }}">
                                                                <strong>{{ $permission->display_name }}</strong><br>
                                                                <small class="text-muted">{{ $permission->url }}</small>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Submit -->
                        <button class="btn btn-success btn-block mt-3" type="submit">
                            {{ isset($role) ? '📝 Update Role' : '📥 Save Role' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Toggle all permissions in a group when group checkbox is clicked
            $('.group-checkbox').on('change', function() {
                var group = $(this).data('group');
                $('.permission-checkbox[data-group="' + group + '"]').prop('checked', $(this).prop(
                    'checked'));
            });

            // Update group checkbox if all individual permissions are checked
            $('.permission-checkbox').on('change', function() {
                var group = $(this).data('group');
                var all = $('.permission-checkbox[data-group="' + group + '"]');
                var checked = $('.permission-checkbox[data-group="' + group + '"]:checked');
                $('.group-checkbox[data-group="' + group + '"]').prop('checked', all.length === checked
                    .length);
            });
        });
    </script>
@endpush
