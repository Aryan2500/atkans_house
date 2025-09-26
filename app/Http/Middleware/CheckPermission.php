<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle(Request $request, Closure $next)
    {
        // Get the logged-in user
        $user = Auth::user();

        // Get current route name
        $routeName = $request->route()->getName();

        // Example: if route name is "users.index"
        // You may customize this based on your naming

        // Check if user has permission
        $permissions = [];
        if (session('permissions')) {
            $permissions = session('permissions');
        } else {
            $permissions = $user->rols ? $user->rols->permissions : [];
        }
        // dd($permissions);
        // dd($routeName);
        foreach ($permissions as $permission) {
            // dd($permission->name);
            if ($routeName == $permission->name) {
                return $next($request);
            }
        }


        // Optional: Flash a message or log unauthorized attempt
        session()->flash('error', 'You do not have permission to access this page.');

        // Redirect or abort
        abort(403, 'Unauthorized');
        // OR
        // abort(403, 'Unauthorized');
    }
}
