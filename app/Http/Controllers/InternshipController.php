<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Intern;
use App\Models\Supervisor;
use App\Models\Company;
use Yajra\DataTables\DataTables;


class InternshipController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:internship-list|internship-create|internship-edit|internship-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:internship-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:internship-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:internship-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $internships = Internship::query();

            return DataTables::of($internships)->addIndexColumn()
            ->editColumn('intern_id', function($data) {
                return $data->intern ? $data->intern->name : '-';
            })
                ->addColumn('action', 'backend.internships.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.internships.index');
//        $companies = Company::latest()->paginate(10);
//
//        return view('backend.companies.index', compact('companies'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $interns = Intern:: pluck('name','id');
        //$interns=Intern:: all();
        $supervisors=Supervisor:: all();
        $companies=Company:: all();
      
        return view('backend.internships.create',compact('interns','supervisors','companies'));
    }
       
    public function store(Request $request)
    {
       
        $data = $request->validate([
            'intern_id' => 'required',
            'supervisor_id'  => 'required',
            'company_id' => 'required',
            'duration'  => 'required',
            'description'  => 'required',
            
        ]);
        Internship::create($data);
        return redirect()->route('internships.index')->with('success', 'Successfully Created!');

    }

    public function show($id)
    {
        $internships = Internship::find($id);
        return view('backend.internships.show')->with('internships', $internships);
    }

    public function edit($id)
    {
        $internship = Internship::findOrFail($id);

        return view('backend.internships.edit', compact('internship'));
    }

    public function update(Request $request, $id)
    {
        $internship = Internship::findOrFail($id);

        $data = $request->validate([
            'intern_id' => 'required',
            'supervisor_id'  => 'required',
            'company_id' => 'required',
            'duration'  => 'required',
            'description'  => 'required',
        ]);

        $internship->update($data);
        return redirect()->route('internships.index')->with('success', 'Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $internship = Internship::findOrFail($request->id)->delete();

        return response()->json($internship);
    }
}
