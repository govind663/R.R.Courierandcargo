<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Generate QrCode
        $qrCode = QrCode::size(300)->generate('Your QR Code Data');
        return view('master.customers.create',['qrCode'=>$qrCode]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $data = $request->validated();
        try {
            $customer = Customer::create($data);
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->mobile_no = $request->mobile_no;
            $customer->address = $request->address;
            $customer->gst_no = $request->gst_no;
            $customer->fuel_surcharge = $request->fuel_surcharge;
            $customer->igst = $request->igst;
            $customer->cgst = $request->cgst;
            $customer->sgst = $request->sgst;
            $customer->inserted_at = Carbon::now();
            $customer->inserted_by = Auth::user()->id;
            $customer->save();

            return redirect()->route('customer.index')->with('message','Customer created successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);
        return view('master.customers.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return view('master.customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $customer = Customer::find($id);
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->mobile_no = $request->mobile_no;
            $customer->address = $request->address;
            $customer->gst_no = $request->gst_no;
            $customer->fuel_surcharge = $request->fuel_surcharge;
            $customer->igst = $request->igst;
            $customer->cgst = $request->cgst;
            $customer->sgst = $request->sgst;
            $customer->modified_at = Carbon::now();
            $customer->modified_by = Auth::user()->id;
            $customer->save();

            return redirect()->route('customer.index')->with('message','Customer updated successfully');

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
            Customer::where('id', $id)->update($data);

            return redirect()->route('customer.index')->with('message','Customer Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }
}
