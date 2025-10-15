<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('hasPermission')) {
    /**
     * Check if the authenticated user has one or more given permissions (route names).
     *
     * Usage:
     * hasPermission('users.index')
     * hasPermission('users.index', 'users.edit', 'dashboard')
     *
     * @param  string  ...$routeNames
     * @return bool
     */
    function hasPermission(string ...$routeNames): bool
    {
        $user = Auth::user();

        if (!$user) {
            return false;
        }

        // Fetch permissions from session or user's role relationship
        $permissions = session('permissions') ?? ($user->rols ? $user->rols->permissions : []);

        // If permissions are Eloquent objects, pluck names
        if (is_iterable($permissions) && isset($permissions[0]) && is_object($permissions[0])) {
            $permissions = collect($permissions)->pluck('name')->toArray();
        }

        // Check if any of the provided route names exist in user's permissions
        foreach ($routeNames as $routeName) {
            if (in_array($routeName, $permissions)) {
                return true;
            }
        }

        return false;
    }
}
