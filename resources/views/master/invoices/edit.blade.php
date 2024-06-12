@extends('layouts.master')

@section('title')
  Invoice | Edit
@endsection

@push('styles')
<style>
    .form-control {
        border: 1px solid #387dff !important;
    }
</style>
@endpush

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="card mb-0">
            <div class="card-body">

                <div class="page-header">
                    <div class="content-page-header">
                        <h5>Edit Invoice</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('invoice.update', $invoice->id) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="text" id="id" name="id" hidden  value="{{ $invoice->id }}" >

                            <div class="form-group-customer customer-additional-form">
                                <div class="row">

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Select Customer Name : <span class="text-danger">*</span></b></label>
                                            <select  class="form-control @error('customer_id') is-invalid @enderror select" id="customer_id" name="customer_id">
                                                <option value="">Select Customer Name</option>
                                                @foreach ($customer as $value )
                                                <option value="{{ $value->id }}" {{ ( $invoice->customer_id == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('customer_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>From Date : <span class="text-danger">*</span></b></label>
                                            <div class="cal-icon cal-icon-info">
                                                <input type="text" id="from_dt" name="from_dt" class="form-control datetimepicker @error('from_dt') is-invalid @enderror" value="{{ $invoice->from_dt }}" placeholder="Enter From Date">
                                                @error('from_dt')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>To Date : <span class="text-danger">*</span></b></label>
                                            <div class="cal-icon cal-icon-info">
                                                <input type="text" id="to_dt" name="to_dt" class="form-control datetimepicker @error('to_dt') is-invalid @enderror" value="{{ $invoice->to_dt }}" placeholder="Enter To Date">
                                                @error('to_dt')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Invoice No. : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="invoice_no" name="invoice_no" class="form-control @error('invoice_no') is-invalid @enderror" value="{{ $invoice->invoice_no }}" placeholder="Enter Invoice No.">
                                            @error('invoice_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Invoice Date : <span class="text-danger">*</span></b></label>
                                            <div class="cal-icon cal-icon-info">
                                                <input type="text" id="invoice_dt" name="invoice_dt" class="form-control datetimepicker @error('invoice_dt') is-invalid @enderror" value="{{ $invoice->invoice_dt }}" placeholder="Enter Invoice Date">
                                                @error('invoice_dt')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Package Charges (RS) : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="package_charges" name="package_charges" class="form-control @error('package_charges') is-invalid @enderror" value="{{ $invoice->package_charges }}" placeholder="Enter Package Charges">
                                            @error('package_charges')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="add-customer-btns text-start">
                                <a href="{{ route('invoice.index') }}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
