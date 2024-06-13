<?php

namespace App\Http\Controllers;

use App\Http\Requests\weightRequest;
use App\Models\Customer;
use App\Models\Unit;
use App\Models\Weight;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weights = Weight::with('customer', 'unit')->orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.weights.index', ['weights'=>$weights]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer = Customer::orderBy("id","desc")->whereNull('deleted_at')->get();
        $unit = Unit::orderBy("id","asc")->whereNull('deleted_at')->get();
        return view('master.weights.create', ['customer'=>$customer, 'unit'=>$unit]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(weightRequest $request)
    {
        $data = $request->validated();
        try {
            $weight = new Weight();
            $weight->customer_id = $request->customer_id;
            $weight->unit_id = $request->unit_id;
            $weight->amount = $request->amount;
            $weight->inserted_at = Carbon::now();
            $weight->inserted_by = Auth::user()->id;
            $weight->save();

            return redirect()->route('weight.index')->with('message','Weight created successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $weight = Weight::find($id);
        return view('master.weights.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $weight = Weight::find($id);
        $customer = Customer::orderBy("id","desc")->whereNull('deleted_at')->get();
        $unit = Unit::orderBy("id","asc")->whereNull('deleted_at')->get();
        return view('master.weights.edit', ['weight'=>$weight, 'customer'=>$customer, 'unit'=>$unit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(weightRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $weight = Weight::find($id);
            $weight->unit_id = $request->unit_id;
            $weight->amount = $request->amount;
            $weight->modified_at = Carbon::now();
            $weight->modified_by = Auth::user()->id;
            $weight->save();

            return redirect()->route('weight.index')->with('message','Weight updated successfully');

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

            $weight = Weight::findOrFail($id);
            $weight->update($data);

            return redirect()->route('weight.index')->with('message','Weight Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
