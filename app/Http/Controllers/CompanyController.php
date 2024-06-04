<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:company-list|company-create|company-edit|company-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:company-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:company-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:company-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()) {
            $companies = Company::query();

            return DataTables::of($companies)->addIndexColumn()
                ->addColumn('action', 'backend.companies.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.companies.index');
//        $companies = Company::latest()->paginate(10);
//
//        return view('backend.companies.index', compact('companies'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('backend.companies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);
        Company::create($data);
        return redirect()->route('companies.index')->with('success', 'Successfully Created!');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('backend.companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);
        $company->update($data);
        return redirect()->route('companies.index')->with('success', 'Successfully Updated!');
    }

    public function destroy(Request $request)
    {
        $company = Company::findOrFail($request->id)->delete();

        return response()->json($company);
    }
}
