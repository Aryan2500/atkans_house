@extends('adminV2.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('adminV2.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($user) ? 'Edit User' : 'Add New User' }}</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST"
                        action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}">
                        @csrf
                        @if (isset($user))
                            @method('PUT')
                        @endif

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $user->name ?? '') }}" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $user->email ?? '') }}" required>
                        </div>

                        <!-- Password (optional for edit) -->
                        <div class="form-group">
                            <label for="password">Password
                                {{ isset($user) ? '(Leave blank to keep existing)' : '' }}</label>
                            <input type="password" name="password" class="form-control"
                                {{ isset($user) ? '' : 'required' }}>
                        </div>

                        <!-- Role -->
                        <div class="form-group">
                            <label for="role_id">Assign Role</label>
                            <select name="role_id" class="form-control" required>
                                <option value="">-- Select Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ old('role_id', $user->role_id ?? '') == $role->id ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Readonly Permissions (based on selected role) -->
                        @if (isset($user) && $user->rols && $user->rols->permissions->count())
                            <div class="form-group">
                                <label>Role Permissions</label>
                                <div class="row">
                                    @foreach ($user->rols->permissions as $permission)
                                        <div class="col-md-4 mb-2">
                                            <span class="badge badge-info">
                                                {{ $permission->display_name }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Submit -->
                        <button class="btn btn-success btn-block" type="submit">
                            {{ isset($user) ? '📝 Update User' : '📥 Save User' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
