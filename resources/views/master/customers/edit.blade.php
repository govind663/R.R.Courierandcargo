@extends('layouts.master')

@section('title')
  Customer | Edit
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
                        <h5>Edit Customer</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('customer.update', $customer->id) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="text" id="id" name="id" hidden  value="{{ $customer->id }}" >

                            <div class="form-group-customer customer-additional-form">
                                <div class="row">

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Name : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $customer->name }}" placeholder="Enter Name">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Email Id : <span class="text-danger">*</span></b></label>
                                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $customer->email }}" placeholder="Enter Email Id">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Mobile number : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="mobile_no" name="mobile_no" maxlength="10" class="form-control @error('mobile_no') is-invalid @enderror" value="{{ $customer->mobile_no }}" placeholder="Enter Mobile Number">
                                            @error('mobile_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Address : <span class="text-danger">*</span></b></label>
                                            <textarea type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $customer->address }}" placeholder="Enter Address">{{ $customer->address }}</textarea>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>GST Number : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="gst_no" name="gst_no" class="form-control @error('gst_no') is-invalid @enderror" value="{{ $customer->gst_no }}" placeholder="Enter GST Number">
                                            @error('gst_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Fuel Surcharge (%) : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="fuel_surcharge" name="fuel_surcharge" class="form-control @error('fuel_surcharge') is-invalid @enderror" value="{{ $customer->fuel_surcharge }}" placeholder="Enter Fuel Surcharge">
                                            @error('fuel_surcharge')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>IGST (%) : </b></label>
                                            <input type="text" id="igst" name="igst" class="form-control" value="{{ $customer->igst }}" placeholder="Enter IGST">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>SGST (%) : </b></label>
                                            <input type="text" id="sgst" name="sgst" class="form-control" value="{{ $customer->sgst }}" placeholder="Enter SGST">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>CGST (%) : </b></label>
                                            <input type="text" id="cgst" name="cgst" class="form-control" value="{{ $customer->cgst }}" placeholder="Enter CGST">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="add-customer-btns text-start">
                                <a href="{{ route('customer.index') }}" class="btn btn-danger">Cancel</a>
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
