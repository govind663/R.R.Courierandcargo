<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{-- Title --}}
    <title>{{ $title }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ public_path('/assets/icons/dtdc_logo.png') }}">

    {{-- Meta data --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="R R Courier And Cargo in Prabhadevi, Mumbai-400025-Get R R Courier And Cargo in Prabhadevi address, phone numbers, user ratings, reviews, contact person and quotes instantly." />
    <meta name="keywords" content="R R Courier And Cargo in Prabhadevi, R R Courier And Cargo in Mumbai, R R Courier And Cargo ratings, reviews of R R Courier And Cargo, R R Courier And Cargo address, R R Courier And Cargo phone numbers, R R Courier And Cargo contact person, get quotes from R R Courier And Cargo, R R Courier And Cargo in 400025" />
    <meta name="author" content="R. R. COURIER & CARGO">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style  type="text/css">
        * {
            font-family:Verdana, Geneva, Tahoma, sans-serif;
            font-size: 17px !important;
        }
        h2 {
            text-align: left;
            color: #2e3131;
            font-size: 40px;
        }
        h4 {
            color: #2e3131;
        }
        .page-break {
            page-break-after: always;
        }
        .avatar-image {
            height: 120px;;
            width: 250px;
            /*height: 4.6rem;*/
            /*width: 8.6rem;*/
        }
        .barcode-image {
            height: 420px;;
            width: 450px;
            /*height: 4.6rem;*/
            /*width: 8.6rem;*/
        }
        .header {
            text-align: left;
            font-size: 20px !important;
            font-style: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
            font-size: 25px !important;
            font-style: bold;
        }
        th, td {
            border: 1px solid black;
            padding: 7px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-size: 22px !important;
        }
    </style>

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 style="font-size:28px !important;">R. R. COURIER & CARGO </h2>

                <div class="header">
                    <div style="float: right;">
                        <img src="{{ public_path('assets/icons/DTDC_icon.png') }}" alt="logo" class="avatar-image">
                    </div>

                    <div style="float: left;" >
                        <p class="mb-1">
                            <b style="font-size: 20px !important;">
                                OFFICE NO.20, <br>
                                RAJLAXMI COMMERCIAL CO OP SOC.,<br>
                                SAYANI ROAD,<br>
                                PRABHADEVI, MUMBAI-400025
                            </b>
                        </p>
                        <p class="mb-1">
                            <b style="font-size: 20px !important;">
                                Email : rrcourierandcargo@gmail.com /
                                prabhadevi.mum@fr.dtdc.com
                            </b><br>
                            <b style="font-size: 20px !important;">
                                Phone: 9769618316 / 93214 21795 / 9082925972 / 8828618316
                            </b>
                        </p>
                    </div>
                </div>

                <table class="table table-bordered border-dark" style="padding-top: 200px;">
                    <thead>
                        <tr>
                            <th style="text-align: center !important; font-size: px !important;" colspan="3">TAX INVOICE</th>
                        </tr>
                    </thead>
                    </tr>

                    <tbody>
                        <tr>
                            <td rowspan="2">To<br>EVERSUB INDIA PRIVATE LIMITED</td>
                            <td>Invoice Period</td>
                            <td>{{ date('d-F-Y', strtotime($invoice->from_dt)) }} To {{ date('d-F-Y', strtotime($invoice->to_dt)) }}</td>
                        </tr>
                        <tr>
                            <td>Invoice No</td>
                            <td>{{ $invoice->invoice_no }}</td>
                        </tr>
                        <tr>
                            <td>Awfis Space Solutions, 3rd Floor, Tower B,</td>
                            <td>Invoice Date</td>
                            <td>{{ date('d-F-Y', strtotime($invoice->invoice_dt)) }}</td>
                        </tr>
                        <tr>
                            <td>Unitech Cyber Park,</td>
                            <td>Net Amount</td>
                            <td>{{ $invoice->total_amount }}</td>
                        </tr>
                        <tr>
                            <td>Gurugram - haryana 122002</td>
                            <td>Fuel Surcharge ({{ $customerFuelSurcharge }}) %</td>
                            <td>{{ $fuelSurcharge }}</td>
                        </tr>
                        <tr>
                            <td>GST N0.06AAGCS5808MIZZ</td>
                            <td>Packaging Charges</td>
                            <td>{{ $packageCharges }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>IGST @ ({{ $customerIGST }}) %</td>
                            <td>{{ $igst }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>CGST @ ({{ $customerCGST }}) %</td>
                            <td>{{ $cgst }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>SGST @ ({{ $customerSGST }}) %</td>
                            <td>{{ $sgst }}</td>
                        </tr>
                        <!--<tr>-->
                        <!--    <td></td>-->
                        <!--    <td>Reverse RTO Charges</td>-->
                        <!--    <td>0</td>-->
                        <!--</tr>-->
                        <tr>
                            <td></td>
                            <td class="fw-bold" style="font-size: 30px !important;">Grand Total</td>
                            <td class="fw-bold" style="font-size: 30px !important;">{{ $grandTotal }}</td>
                        </tr>
                    </tbody>
                </table>

                <div style="col-sm-6 float: left;">
                    <p class="text-bold text-capitalize" style="font-size: 25px !important;">
                        {{ $amountInWords }}
                    </p>

                    <p style="font-size: 20px !important;">
                        <b>
                            Statutory Guidelines
                        </b>
                    </p>

                    <p style="font-size: 20px !important;">
                        <b>
                            PAN No. :  AQLPP5324M
                        </b>
                    </p>
                    <p style="font-size: 20px !important;">
                        <b>
                            GST NO. 27AQLPP5324MIZA
                        </b>
                    </p>
                    <p style="font-size: 20px !important;">
                        <b>
                            HSN NO./SAC :- 996812
                        </b>
                    </p>

                    <p class="mb-1 text-bold text-justify" style="font-size: 18px !important;">
                        Payment Should be made in favour of <b>"R. R. COURIER & CARGO"</b>
                        Any Mistake/correction found in the invoice has to be reported in writing
                        within Seven days from the reciept of the invoice.
                        This is a computer-generated invoice and hence does not require signature.
                        For any queries please contact on 022-66662183
                        Reverse RTO Charges 20% on c/ment bill amount.
                        Fuel Surcharge*is calculated only on Net Amount
                    </p>
                </div>

                <table class="table table-bordered ">
                    <tbody>
                        <tr>
                            <td style="width: 70%; text-align: justify; padding:20px;">
                                <p>
                                    1. PAN No. :  AQLPP5324M
                                </p>
                                <p>
                                    2. Payment Should be made ONLY by crossed cheque or DD in
                                           favour of DTDC Express Ltd. after obtaining money
                                           receipt positively. OR NEFT to designated account.
                                </p>
                                <p>
                                    3.  PAYMENT DUE DATE :  {{ $date }}
                                </p>
                                <p>
                                    4.  Any delay in payment after due date : will be charged
                                            24% per annum on prorata basis.
                                </p>

                                <h4>General Guidelines</h4>
                                <p>
                                    1.  kindly acknowledge the receipt of the bill by handing over the bill
                                           acknowledgement.Duly filled up. To our representive who delivers the
                                           bill to you.
                                </p>

                                <p>
                                    2.  While making the payment please handover the payment advice with full
                                           details.
                                </p>

                                <p>
                                    3.  Any mistakes / correction found in the invoice has to be reported in writing
                                           within 7 days from the recipt of the invoice.
                                </p>

                                <p>
                                    4.  This is a computer-generated invoice and hence does not require signature.
                                </p>

                                <p>
                                    5.  For any queries please contact Regional Commercial Department.
                                </p>
                            </td>

                            <td style="width: 30%; text-align: justify;">
                                <img src="{{ public_path('/assets/qrcode/QrCode.jpg') }}" alt="QrCode" class="barcode-image">
                                {{-- <img src='data:image/png;base64,".base64_encode({{ $qrCode }})."'> --}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="page-break"></div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-nowrap table-avatar">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Pickup Date</th>
                            <th>C. Note Number</th>
                            <th>Destination</th>
                            <th>Weight (gram)</th>
                            <th>Amount (RS)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parcels as $key => $value)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>
                                {{ date('d-m-Y', strtotime($value->pickup_dt)) }}
                            </td>
                            <td>
                                {{ $value->c_note_number }}
                            </td>
                            <td>
                                {{ $value->destination }}
                            </td>
                            <td>
                                {{ $value->weight }}
                            </td>
                            <td>
                                {{ $value->amount }}
                            </td>
                        </tr>
                        @endforeach
                        <tfoot>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="fw-bold" style="font-size: 30px !important;">Net Amount</td>
                            <td class="fw-bold" style="font-size: 30px !important;">{{ $invoice->total_amount }}</td>
                        </tfoot>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-nowrap">
                    <thead>
                        <tr>
                            <td colspan="3" class="text-center" style="font-size: 30px !important;">R. R. COURIER & CARGO</td>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-center">BILL ACKNOWLEDGEMENT</th>
                        </tr>
                    </thead>
                </tr>
                    {{-- Add 3 rowspan in column --}}
                    <tbody>
                        <tr>
                            <td>Invoice No : - {{ $invoice->invoice_no }}</td>
                            <td>Invoice Date : - {{ date('d/m/Y', strtotime($invoice->invoice_dt)) }}</td>
                            <td>EVERSUB INDIA PRIVATE LIMITED</td>
                        </tr>
                    </tbody>
                </tr>
                <tbody>
                    <tr>
                        <tr>
                            <td>Name of the Receiver</td>
                            <td></td>
                            <td rowspan="2">Sign & Seal
                                <br>

                            </td>
                        </tr>
                        <tr>
                            <td>Receiver Date</td>
                            <td></td>
                        </tr>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>

        <h3 style="font-size: 25px !important;">For : R. R. COURIER & CARGO <br> <br> <br></h3>

        <h3 style="font-size: 25px !important;">Account</h3>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-nowrap">
                    <thead>
                        <tr>
                            <td class="text-center" style="font-size: 25px !important;">Please make payment in favour of "R. R. COURIER & CARGO"</td>
                        </tr>
                        <tr>
                            <th class="text-center" style="font-size: 25px !important;">NEFT / RTGS DETAIL :</th>
                        </tr>
                        <tr>
                            <th class="text-center" style="font-size: 25px !important;">
                                <P>
                                    <b>Company Name : R. R. COURIER & CARGO </b> <br>
                                    <b>New Bank Name : HDFC BANK </b> <br>
                                    <b>New Bank Account Number : 59200002061983 </b> <br>
                                    <b>NEFT / RTGS IFSC Code : HDFC0000012 </b> <br>
                                    <b>Bank Branch Name : PRABHADEVI - 400025 </b> <br>
                                </P>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
