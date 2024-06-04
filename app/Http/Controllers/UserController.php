<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $users = User::query();

            return DataTables::of($users)->addIndexColumn()
                ->addColumn('roles', function($data) {
                    return implode(', ', $data->roles->pluck('name')->toArray());
                })
                ->addColumn('action', 'backend.users.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.users.index');
//        $users = User::with('roles')->paginate(10);

//        return view('backend.users.index', compact('users'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $roles = Role::get();

        return view('backend.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['is_student'] = 0;

        $admin = User::create($data);

        // Sync roles if roles are present in the request
        if ($request->has('roles')) {
            $admin->syncRoles($request->roles);
        }

        return redirect()->route('users.index')->with('success', 'Successfully Created!');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $old_roles = $user->roles->pluck('name')->toArray();
        $roles = Role::get();

        return view('backend.users.edit', compact('user', 'old_roles', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email']
        ]);

        $data['password'] = $request->filled('password') ? Hash::make($data['password']) : $user->password;

        $user->update($data);

        if($request->has('roles')) {
            $user->syncRoles($request->roles);
        }

        return redirect()->route('users.index')->with('success', 'Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id)->delete();

        return response()->json($user);
    }
}
