<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.unit.index', ['units'=>$units]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitRequest $request)
    {
        $data = $request->validated();
        try {

            $unit = new Unit();
            $unit->min_weight_range = $request->min_weight_range;
            $unit->max_weight_range = $request->max_weight_range;
            $unit->name = $request->name;
            $unit->inserted_at = Carbon::now();
            $unit->inserted_by = Auth::user()->id;
            $unit->save();

            return redirect()->route('unit.index')->with('message','Unit created successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unit = Unit::find($id);
        return view('master.unit.show', ['unit'=>$unit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unit = Unit::find($id);
        return view('master.unit.edit', ['unit'=>$unit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $unit = Unit::find($id);
            $unit->min_weight_range = $request->min_weight_range;
            $unit->max_weight_range = $request->max_weight_range;
            $unit->name = $request->name;
            $unit->modified_by = Auth::user()->id;
            $unit->save();

            return redirect()->route('unit.index')->with('message','Unit updated successfully');

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

            $unit = Unit::findOrFail($id);
            $unit->update($data);

            return redirect()->route('unit.index')->with('message','Unit Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
