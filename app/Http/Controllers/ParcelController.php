<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParcelRequest;
use App\Models\Customer;
use App\Models\Parcel;
use App\Models\Unit;
use App\Models\Weight;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parcels = Parcel::with('customer', 'unit')->orderBy("id","desc")->whereNull('deleted_at')->get();
        return view("master.parcel.index", ['parcels'=>$parcels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer = Customer::orderBy("id","desc")->whereNull('deleted_at')->get();
        $unit = Unit::orderBy("id","asc")->whereNull('deleted_at')->get();
        $weight = Weight::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view("master.parcel.create", ["customer"=>$customer, "unit"=>$unit, "weight"=>$weight]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParcelRequest $request)
    {
        $data = $request->validated();
        try {

            $parcel = new Parcel();
            $parcel->customer_id = $request->customer_id;
            $parcel->pickup_dt = date('Y-m-d', strtotime($request->pickup_dt));
            $parcel->pickup_time = Carbon::now()->toTimeString();
            $parcel->c_note_number = $request->c_note_number;
            $parcel->destination = $request->destination;
            $parcel->within_mumbai_thane = $request->within_mumbai_thane;
            $parcel->surface = $request->surface;
            $parcel->weight = $request->weight;
            $parcel->unit_id = $request->unit_id;
            $parcel->amount = $request->amount;
            $parcel->inserted_at = Carbon::now();
            $parcel->inserted_by = Auth::user()->id;
            $parcel->save();

            // ==== Generate Invoice Number ====
            $parcelUniqueId = "INV". "/" . sprintf("%06d", abs((int) $parcel->id + 1))  . "/" . date("Y");
            $update = [
                'parcel_Id' => $parcelUniqueId,
            ];
            Parcel::where('id', $parcel->id)->update($update);

            return redirect()->route('parcel.index')->with('message','Parcel created successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $parcel = Parcel::findOrFail($id);
        return view("master.parcel.show", ["parcel"=>$parcel]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $parcel = Parcel::findOrFail($id);
        $customer = Customer::orderBy("id","desc")->whereNull('deleted_at')->get();
        $unit = Unit::orderBy("id","desc")->whereNull('deleted_at')->get();
        $weight = Weight::orderBy("id","desc")->whereNull('deleted_at')->get();

        return view("master.parcel.edit", ["parcel"=>$parcel, "customer"=>$customer, "unit"=>$unit, "weight"=>$weight]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ParcelRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $parcel = Parcel::findOrFail($id);
            $parcel->customer_id = $request->customer_id;
            $parcel->pickup_dt = date('Y-m-d', strtotime($request->pickup_dt));
            $parcel->c_note_number = $request->c_note_number;
            $parcel->destination = $request->destination;
            $parcel->within_mumbai_thane = $request->within_mumbai_thane;
            $parcel->surface = $request->surface;
            $parcel->weight = $request->weight;
            $parcel->unit_id = $request->unit_id;
            $parcel->amount = $request->amount;
            $parcel->modified_at = Carbon::now();
            $parcel->modified_by = Auth::user()->id;
            $parcel->save();

            return redirect()->route('parcel.index')->with('message','Parcel updated successfully');

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
            $parcel = Parcel::findOrFail($id);
            $parcel->update($data);

            return redirect()->route('parcel.index')->with('message','Parcel Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }

    public function fetch_weight_amt(Request $request){

        $data['unitID'] = $request->unitId;
        $data['customerId'] = $request->customerId;
        $data['weights'] = $request->weight;

        // Using having clause to filter the units based on weight range
        $data['rangeUnitId'] = Unit::where('id', $data['unitID'])->pluck('id')->first();

        // Default amount if no range matches
        $data['calculatedAmount'] = '';

        // === get amount in rangeUnitId wise in if condition weights
        if($data['rangeUnitId'] == '1'){
            $data['calculatedAmount'] = Weight::where('customer_id', $data['customerId'])->where('unit_id', $data['rangeUnitId'])->pluck('amount')->first();
        }else if($data['rangeUnitId'] == '2'){
            $data['calculatedAmount'] = Weight::where('customer_id', $data['customerId'])->where('unit_id', $data['rangeUnitId'])->pluck('amount')->first();
        }else if($data['rangeUnitId'] == '3'){
            $data['calculatedAmount'] = Weight::where('customer_id', $data['customerId'])->where('unit_id', $data['rangeUnitId'])->pluck('amount')->first();
        }else if($data['rangeUnitId'] == '4'){
            $data['currentAmount'] = Weight::where('customer_id', $data['customerId'])->where('unit_id', $data['rangeUnitId'])->pluck('amount')->first();
            $data['calculatedAmount'] = $data['currentAmount'] * $data['weights'];
        }
        $data['amount'] = $data['calculatedAmount'];

        return response()->json($data);
    }
}
