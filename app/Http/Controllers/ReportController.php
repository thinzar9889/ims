<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Intern;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    public function __construct()
    {
         $this->middleware('permission:report-list|report-create|report-edit|report-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:report-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:report-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:report-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $reports = Report::query();

            return DataTables::of($reports)->addIndexColumn()
                ->addColumn('action', 'backend.reports.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.reports.index');
//        $companies = Company::latest()->paginate(10);
//
//        return view('backend.companies.index', compact('companies'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function create()
    {   
        $interns = Intern::all();
        return view('backend.reports.create',compact('interns'));
    }

    public function store(Request $request)
    {   
        $data = $request->validate([
            'intern_id' => 'required',
            'roll_no' => 'required',
            'month' => 'required',
            'week' => 'required',
           'first_description' => 'required',  
           'second_description' => 'required',   
           'third_description' => 'required',   
           'fourth_description' => 'required',   
           'fifth_description' => 'required',
           'comment' => 'required',
           'reflection' => 'required'
        ]);
        // dd($data);
        Report::create($data);
        return redirect()->route('reports.index')->with('success', 'Successfully Created!');

    }

    public function show($id)
    {
        $report = Report::find($id);
        return view('backend.reports.show')->with('report', $report);
    }
    public function edit($id)
    {
        $report= Report::findOrFail($id);

        return view('backend.reports.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $data = $request->validate([
            'intern_id' => 'required',
            'roll_no' => 'required',
            'month' => 'required',
            'week' => 'required',
            'first_description' => 'required',  
            'second_description' => 'required',   
            'third_description' => 'required',   
            'fourth_description' => 'required',   
            'fifth_description' => 'required',
            'comment' => 'required',
            'reflection' => 'required'
        ]);
        $report->update($data);
        return redirect()->route('reports.index')->with('success', 'Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $report= Report::findOrFail($request->id)->delete();

        return response()->json($report);
    }
}
