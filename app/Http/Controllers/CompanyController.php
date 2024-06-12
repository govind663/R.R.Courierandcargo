<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.companies.index', ['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $data = $request->validated();
        try {
            $company = new Company();
            $company->name = $request->name;
            $company->email = $request->email;
            $company->mobile_no = $request->mobile_no;
            $company->address = $request->address;
            $company->gst_no = $request->gst_no;
            $company->inserted_at = Carbon::now();
            $company->inserted_by = Auth::user()->id;
            $company->save();

            return redirect()->route('home')->with('message','Company created successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);
        return view('master.companies.show', ['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::find($id);
        return view('master.companies.edit', ['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $company = Company::find($id);
            $company->name = $request->name;
            $company->email = $request->email;
            $company->mobile_no = $request->mobile_no;
            $company->address = $request->address;
            $company->gst_no = $request->gst_no;
            $company->modified_at = Carbon::now();
            $company->modified_by = Auth::user()->id;
            $company->save();

            return redirect()->route('home')->with('message','Company updated successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $company = Company::findOrFail($id);
            $company->update($data);

            return redirect()->route('company.index')->with('message','Company Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
