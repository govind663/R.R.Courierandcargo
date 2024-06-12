<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Parcel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Helpers\NumberToWordsHelper;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with('customer')->orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.invoices.index', ['invoices'=>$invoices]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer = Customer::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.invoices.create', ['customer'=>$customer]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceRequest $request)
    {
        $data = $request->validated();
        try {

            $invoice = new Invoice();

            $invoice->customer_id = $request->customer_id;
            $invoice->from_dt = date('Y-m-d', strtotime($request->from_dt));
            $invoice->to_dt = date('Y-m-d', strtotime($request->to_dt));
            $invoice->invoice_no = $request->invoice_no;
            $invoice->invoice_dt = date('Y-m-d', strtotime($request->invoice_dt));
            $invoice->package_charges = $request->package_charges;
            $invoice->inserted_at = Carbon::now();
            $invoice->inserted_by = Auth::user()->id;
            $invoice->save();

            $fromDate = Carbon::parse($request->from_dt)->format('Y-m-d');
            $toDate = Carbon::parse($request->to_dt)->format('Y-m-d');

            // ==== Fetch Parcel Id
            $allParcelId = Parcel::where('customer_id', $request->customer_id)
                                ->orderBy('inserted_at', 'desc')
                                ->whereBetween('pickup_dt', [$fromDate, $toDate])
                                ->whereNull('deleted_at')
                                ->pluck('parcel_Id')
                                ->toArray();
            // dd($allParcelId);
            // ==== Total Amount
            $amount = Parcel::where('customer_id', $request->customer_id)
                                ->orderBy('inserted_at', 'desc')
                                ->whereBetween('pickup_dt', [$fromDate, $toDate])
                                ->whereNull('deleted_at')
                                ->sum('amount');
            $update = [
                'parcel_no' => json_encode($allParcelId),
                'total_amount' => $amount
            ];
            Invoice::where('id', $invoice->id)->update($update);

            return redirect()->route('invoice.index')->with('message','Invoice created successfully');

        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong  - '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::find($id);
        return view('master.invoices.show', ['invoice' => $invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $invoice = Invoice::find($id);
        $customer = Customer::orderBy("id","desc")->whereNull('deleted_at')->get();
        return view('master.invoices.edit', ['invoice' => $invoice, 'customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceRequest $request, string $id)
    {
        $data = $request->validated();
        try {
            $invoice = Invoice::findOrFail($id);

            $invoice->customer_id = $request->customer_id;
            $invoice->from_dt = date('Y-m-d', strtotime($request->from_dt));
            $invoice->to_dt = date('Y-m-d', strtotime($request->to_dt));
            $invoice->invoice_no = $request->invoice_no;
            $invoice->invoice_dt = date('Y-m-d', strtotime($request->invoice_dt));
            $invoice->package_charges = $request->package_charges;
            $invoice->modified_at = Carbon::now();
            $invoice->modified_by = Auth::user()->id;
            $invoice->save();

            return redirect()->route('invoice.index')->with('message','Invoice updated successfully');

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
            $invoice = Invoice::findOrFail($id);
            $invoice->update($data);

            return redirect()->route('invoice.index')->with('message','Invoice Deleted Succeessfully');
        } catch(\Exception $ex){

            return redirect()->back()->with('error','Something Went Wrong - '.$ex->getMessage());
        }
    }

    public function getParcelList(Request $request){

        $customerId = $request['customerId'];

        $data['getParcelList'] = Parcel::where('customer_id', $customerId)
                                ->orderBy('inserted_at', 'desc')
                                ->whereNull('deleted_at')
                                ->sum('amount');

        return response()->json($data);
    }

    // === generateCustomerWisePDF
    public function generateCustomerWisePDF(Request $request, $id, $customer_id){

        // Generate QrCode with PDF
        $data['qrCode'] = QrCode::format('png')->size(300)->generate('Your QR Code Data');
        // dd($data['qrCode']);

        $basic_detail = [
            'title' => 'R. R. Courier & Cargo',
            'date' => date('d-m-Y'),        ];

        $data['invoice'] = Invoice::findOrFail($id);

        $data['parcelIds'] = Invoice::findOrFail($id)->pluck('parcel_no')->toArray();
        // return $data;

        foreach ($data['parcelIds'] as $parcelId) {
            $data['actualId'][] = $parcelId . PHP_EOL;
            // dd($data['actualId']);
        }

        $from_date = Invoice::findOrFail($id)->where('customer_id',$customer_id)->pluck('from_dt')->toArray();
        $to_date = Invoice::findOrFail($id)->where('customer_id',$customer_id)->pluck('to_dt')->toArray();
        $customer_id = Invoice::findOrFail($id)->where('customer_id',$customer_id)->pluck('customer_id')->toArray();
        // dd($customer_id);
        $data['parcels'] = Parcel::where('customer_id', $customer_id)
                                    ->whereBetween('pickup_dt', [$from_date, $to_date])
                                    ->whereNull('deleted_at')
                                    ->get();


        // === get nt amount
        $data['netAmount'] = Invoice::findOrFail($id)->pluck('total_amount')->first();
        // dd($data['netAmount']);

        // === get package Charges
        $data['packageCharges'] = Invoice::findOrFail($id)->pluck('package_charges')->first();
        // dd($data['packageCharges']);

        // === get customer fuelsurcharge
        $data['customerFuelSurcharge'] = Customer::findOrFail($customer_id)->pluck('fuel_surcharge')->first();
        // dd($data['customerFuelSurcharge']);

        // === get customer IGST
        $data['customerIGST'] = Customer::findOrFail($customer_id)->pluck('igst')->first();
        // dd($data['customerIGST']);

        // === get customer CGST
        $data['customerCGST'] = Customer::findOrFail($customer_id)->pluck('cgst')->first();
        // dd($data['customerCGST']);

        // === get customer SGST
        $data['customerSGST'] = Customer::findOrFail($customer_id)->pluck('sgst')->first();
        // dd($data['customerSGST']);

        // Calculate the fuel surcharge
        $fuelSurcharge = $data['netAmount'] / 100;
        $fuelSurcharge = $fuelSurcharge * $data['customerFuelSurcharge'];
        // dd($fuelSurcharge);
        $data['fuelSurcharge'] = round($fuelSurcharge, 2);

        // Calculate the GST
        $data['gst'] = $data['netAmount'] + $data['packageCharges'] + $data['fuelSurcharge'];
        // dd($data['gst']);

        // Calculate the IGST
        $igst = $data['gst'] / 100;
        $igst = $igst * $data['customerIGST'];
        $data['igst'] = round($igst, 2);
        // dd($data['igst']);

        // Calculate the SGST
        $sgst = $data['gst'] / 100;
        $sgst = $sgst * $data['customerSGST'];
        $data['sgst'] = round($sgst, 2);
        // dd($data['sgst']);

        // Calculate the CGST
        $cgst = $data['gst'] / 100;
        $cgst = $cgst * $data['customerCGST'];
        $data['cgst'] = round($cgst, 2);
        // dd($data['cgst']);

        // Calculate the Grand Total
        $data['grandTotal'] = $data['netAmount'] + $data['packageCharges'] + $data['fuelSurcharge'] + $data['igst'] + $data['sgst'] + $data['cgst'];
        // dd($data['grandTotal']);

        // === get amount in words first letter Captilize
        $data['amountInWords'] = NumberToWordsHelper::convert($data['grandTotal']);

        return FacadePdf::loadView('master.invoices.pdf', $basic_detail, $data)
        ->setPaper('a4', 'portrait')
        ->setOption('isRemoteEnabled', true)
        ->setOption('enable-javascript', true)
        ->setOption('enable-plugins', true)
        ->setWarnings(false)
        ->setOption(['dpi' => 160, 'defaultFont' => 'sans-serif'])
        ->setOption('margin-bottom', 0)
        ->setOption('margin-left', 0)
        ->setOption('margin-right', 0)
        ->setOption('margin-top', 0)
        ->setOption('print-media-type', true)
        ->setOption('header-html', '<style>body { margin: 0px; }</style>')
        ->stream("R. R. Courier & Cargo".$id.".pdf");
    }
}
