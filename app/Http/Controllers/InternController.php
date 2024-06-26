<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InternController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:intern-list|intern-create|intern-edit|intern-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:intern-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:intern-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:intern-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $interns = Intern::query();

            return DataTables::of($interns)->addIndexColumn()
                ->addColumn('action', 'backend.interns.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.interns.index');
//        $companies = Company::latest()->paginate(10);
//
//        return view('backend.companies.index', compact('companies'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('backend.interns.create');
    }
       
    public function store(Request $request)
    {
       
        $data = $request->validate([
            'name' => 'required',
            'birth_date'  => 'required',
            'nrc' => 'required',
            'email'  => 'required',
            'password'  => 'required',
            'phone'  => 'required',
            'roll_no'  => 'required',
            'degree'  => 'required',
            'specialization'  => 'required',
            'class_project'  => 'required',
            'activity'  => 'required',
            'skill'  => 'required',
            'qualification'  => 'required',
            'gender'  => 'required',
            'address' => 'required'
        ]);
        Intern::create($data);
        return redirect()->route('interns.index')->with('success', 'Successfully Created!');

    }

    public function show($id)
    {
        $interns = Intern::find($id);
        return view('backend.interns.show')->with('interns', $interns);
    }

    public function edit($id)
    {
        $intern = Intern::findOrFail($id);

        return view('backend.interns.edit', compact('intern'));
    }

    public function update(Request $request, $id)
    {
        $intern = Intern::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'birth_date'  => 'required',
            'nrc' => 'required',
            'email'  => 'required',
            'password'  => 'required',
            'phone'  => 'required',
            'roll_no'  => 'required',
            'degree'  => 'required',
            'specialization'  => 'required',
            'class_project'  => 'required',
            'activity'  => 'required',
            'skill'  => 'required',
            'qualification'  => 'required',
            'gender'  => 'required',
            'address' => 'required'
        ]);

        $intern->update($data);
        return redirect()->route('interns.index')->with('success', 'Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $intern = Intern::findOrFail($request->id)->delete();

        return response()->json($intern);
    }
}
