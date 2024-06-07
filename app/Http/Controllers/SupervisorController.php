<?php

namespace App\Http\Controllers;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:supervisor-list|supervisor-create|supervisor-edit|supervisor-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:supervisor-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:supervisor-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:supervisor-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $supervisors = Supervisor::query();

            return DataTables::of($supervisors)->addIndexColumn()
                ->addColumn('action', 'backend.supervisors.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.supervisors.index');
//        $companies = Company::latest()->paginate(10);
//
//        return view('backend.companies.index', compact('companies'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('backend.supervisors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> ['required','string', 'min:8'],
            'phone'=> 'required|digits:11',
            'position'=> 'required',
            'address' => 'required'
        ]);
        Supervisor::create($data);
        return redirect()->route('supervisors.index')->with('success', 'Successfully Created!');

    }

    public function show($id)
    {
        $supervisors = Supervisor::find($id);

        return view('backend.supervisors.show')->with('supervisors', $supervisors);
    }

    public function edit($id)
    {
        $supervisor = Supervisor::findOrFail($id);

        return view('backend.supervisors.edit', compact('supervisor'));
    }

    public function update(Request $request, $id)
    {
        $supervisor = Supervisor::findOrFail($id);

        $data = $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'phone'=> 'required',
            'position'=> 'required',
            'address' => 'required'
        ]);
        $supervisor->update($data);
        return redirect()->route('supervisors.index')->with('success', 'Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $supervisor = Supervisor::findOrFail($request->id)->delete();

        return response()->json($supervisor);
    }
}
