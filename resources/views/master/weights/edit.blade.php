@extends('layouts.master')

@section('title')
  Weight | Edit
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
                        <h5>Edit Weight</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('weight.update', $weight->id) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="text" id="id" name="id" hidden  value="{{ $weight->id }}" >

                            <div class="form-group-customer customer-additional-form">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Select Customer Name : <span class="text-danger">*</span></b></label>
                                            <select  class="form-control @error('customer_id') is-invalid @enderror select" id="customer_id" name="customer_id">
                                                <option value="">Select Customer Name</option>
                                                @foreach ($customer as $value )
                                                <option value="{{ $value->id }}" {{ ( $weight->customer_id == $value->id ? "selected":"") }}>{{ $value->name }}</option>
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
                                            <label><b>Select Weight Range : <span class="text-danger">*</span></b></label>
                                            <select  class="form-control @error('unit_id') is-invalid @enderror select" id="unit_id" name="unit_id">
                                                <option value="">Select Weight Range</option>
                                                @foreach ($unit as $weightrange)
                                                <option value="{{ $weightrange->id }}" {{ ($weight->unit_id == $weightrange->id ? "selected":"") }}>{{ $weightrange->min_weight_range }} - {{ $weightrange->max_weight_range }} {{ $weightrange->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('unit_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Select Unit Name : <span class="text-danger">*</span></b></label>
                                            <select  class="form-control @error('unit_id') is-invalid @enderror select" id="unit_id" name="unit_id">
                                                <option value="">Select Unit Name</option>
                                                @foreach ($unit as $value )
                                                <option value="{{ $value->id }}" {{ ( $unit->unit_id == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('unit_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Amount : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="amount" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ $weight->amount }}" placeholder="Enter Amount">
                                            @error('amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="add-customer-btns text-start">
                                <a href="{{ route('weight.index') }}" class="btn btn-danger">Cancel</a>
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
