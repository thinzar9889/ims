<?php

namespace App\Http\Controllers;
use App\Models\Evaluation;
use App\Models\Intern;
use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EvaluationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:evaluation-list|evaluation-create|evaluation-show|evaluation-edit|evaluation-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:evaluation-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:evaluation-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:evaluation-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $evaluations = Evaluation::query();

            return DataTables::of($evaluations)->addIndexColumn()
                ->addColumn('action', 'backend.evaluations.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.evaluations.index');
    }
    public function create()
    {
        $interns = Intern::all();
        $companies = Company::all();
        return view('backend.evaluations.create', compact('interns', 'companies'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'intern_id' => 'required',
            'roll_no' => 'required',
            'company_id' => 'required',
            'company_username' => 'required',
            'period' => 'required',
            'leaves_day' => 'required',
            'contact_supervisor' => 'required',
            'punctual' => 'required',
            'reliably_performed_assignments' => 'required',
            'ability_solve_problem' => 'required',
            'organization_skills'=> 'required',
            'communication_skills'=> 'required',
            'ability_work_independently'=> 'required',
            'willingness_learn_new_tasks'=> 'required',
            'eagerness_to_learn'=> 'required',
            'basic_skill'=> 'required',
            'professional_appearance'=> 'required',
            'overall_assessment_work_quality'=> 'required',
            'professional_viewpoint',
            'comments_student',
            'comments_intership',
            'comments' => 'required'
        ]);
        Evaluation::create($data);
        return redirect()->route('evaluations.index')->with('success', 'Successfully Created!');

    }
    public function show($id)
    {
        $evaluation = Evaluation::find($id);

        return view('backend.evaluations.show')->with('evaluation', $evaluation);
    }
    public function edit($id)
    {
        $evaluation = Evaluation::findOrFail($id);

        return view('backend.evaluations.edit', compact('evaluation'));
    }
    public function update(Request $request, $id)
    {

        $company = Company::findOrFail($id);
        $data = $request->validate([
            'intern_id' => 'required',
            'roll_no' => 'required',
            'company_id' => 'required',
            'company_username' => 'required',
            'period' => 'required',
            'leaves_day' => 'required',
            'contact_supervisor' => 'required',
            'punctual' => 'required',
            'reliably_performed_assignments' => 'required',
            'ability_solve_problem' => 'required',
            'organization_skills'=> 'required',
            'communication_skills'=> 'required',
            'ability_work_independently'=> 'required',
            'willingness_learn_new_tasks'=> 'required',
            'eagerness_to_learn'=> 'required',
            'basic_skill'=> 'required',
            'professional_appearance'=> 'required',
            'overall_assessment_work_quality'=> 'required',
            'professional_viewpoint',
            'comments_student',
            'comments_intership',
            'comments' => 'required'
        ]);

        $company->update($data);
        return redirect()->route('companies.index')->with('success', 'Successfully Updated!');
    }
    public function destroy(Request $request)
    {
        $evaluation = Evaluation::findOrFail($request->id)->delete();

        return response()->json($evaluation);
    }


}
