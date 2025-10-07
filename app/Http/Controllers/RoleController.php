<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::with('permissions')->get();
        return view('adminV2.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // dd(config('constant.permissions'));
        $permissions  = Permission::all();
        return view("adminV2.roles.form", compact("permissions"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles,name',
            'description' => 'nullable',
            'permissions' => 'array',
        ]);

        // Remove 'permissions' from validated array
        $roleData = collect($validated)->except('permissions')->toArray();

        $role = Role::create($roleData);

        // Sync permissions after creating role
        $role->permissions()->sync($request->permissions ?? []);

        return redirect()->route('role.index')->with('success', 'Role created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $role = Role::with('permissions')->findOrFail($id);
        $permissions  = Permission::all();
        return view("adminV2.roles.form", compact("role", "permissions"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'description' => 'nullable',
            'permissions' => 'array',
        ]);
        $roleData = collect($validated)->except('permissions')->toArray();

        $role->update($roleData);
        $role->permissions()->sync($request->permissions ?? []);

        return redirect()->route('role.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        // Detach all permissions before deleting
        $role->permissions()->detach();

        // Delete the role
        $role->delete();

        return redirect()->route('role.index')->with('success', 'Role deleted successfully.');
    }
}
