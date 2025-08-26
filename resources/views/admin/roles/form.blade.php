@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('admin.partials.alerts')

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
                        <div class="form-group">
                            <label for="name">Role System Name (e.g., admin, manager)</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $role->name ?? '') }}" required>
                        </div>


                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description (optional)</label>
                            <textarea name="description" class="form-control" rows="2">{{ old('description', $role->description ?? '') }}</textarea>
                        </div>

                        <!-- Permissions -->
                        <div class="form-group">
                            <label>Assign Permissions</label>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-4">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="permissions[]"
                                                value="{{ $permission->id }}" id="perm_{{ $permission->id }}"
                                                {{ (isset($role) && $role->permissions->contains($permission->id)) || (is_array(old('permissions')) && in_array($permission->id, old('permissions', []))) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perm_{{ $permission->id }}">
                                                <strong>{{ $permission->display_name }}</strong>
                                                <br>
                                                <small class="text-muted">
                                                    {{ $permission->url }}</small>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Submit -->
                        <button class="btn btn-success btn-block" type="submit">
                            {{ isset($role) ? '📝 Update Role' : '📥 Save Role' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
