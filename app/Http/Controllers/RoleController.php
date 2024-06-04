<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if(request()->ajax()) {
            $roles = Role::query();
            return DataTables::of($roles)
                ->addIndexColumn()
                ->addColumn('permissions', function ($data){
                    $permissions = '';
                    foreach ($data->permissions as $permission){
                        $permissions .= $permission->name . ', ';
                    }
                    // Remove the trailing comma and space if there are permissions
                    $permissions = rtrim($permissions, ', ');

                    return $permissions;
                })
                ->addColumn('action', 'backend.roles.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.roles.index');
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('backend.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);
        $role = Role::create(['name' => $data['name']]);
        $role->givePermissionTo($data['permissions']);
        return redirect()->route('roles.index')->with('success', 'Successfully Created!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $old_permissions = $role->permissions->pluck('id')->toArray();
        $permissions = Permission::all();

        return view('backend.roles.edit', compact('role', 'old_permissions', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);
        $role = Role::findOrFail($id);
        $role->update($data);

        if (isset($data['permissions'])) {
            $role->syncPermissions($data['permissions']);
        } else {
            // If no permissions are selected, revoke all existing permissions
            $role->revokePermissionTo($role->permissions);
        }

        return redirect()->route('roles.index')->with('success', 'Successfully updated!');
    }

    public function destroy(Request $request)
    {
        $role = Role::findOrFail($request->id)->delete();
        return Response()->json($role);
    }
}
