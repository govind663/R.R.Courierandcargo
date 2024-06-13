@extends('layouts.master')

@section('title')
    Weight | Add
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
                            <h5>Add Weight</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('weight.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group-customer customer-additional-form">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Select Customer Name : <span class="text-danger">*</span></b></label>
                                                <select  class="form-control @error('customer_id') is-invalid @enderror select" id="customer_id" name="customer_id">
                                                    <option value="">Select Customer Name</option>
                                                    @foreach ($customer as $value )
                                                    <option value="{{ $value->id }}" {{ (old("customer_id") == $value->id ? "selected":"") }}>{{ $value->name }}</option>
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
                                                <select  class="form-control @error('weight_range') is-invalid @enderror select" id="weight_range" name="weight_range">
                                                    <option value="">Select Weight Range</option>
                                                    <option value="1" {{ (old("weight_range") == '1' ? "selected":"") }}>0.01 - 250 (g)</option>
                                                    <option value="2" {{ (old("weight_range") == '2' ? "selected":"") }}>251 - 500 (g)</option>
                                                    <option value="3" {{ (old("weight_range") == '3' ? "selected":"") }}>1 (Kg)</option>
                                                </select>
                                                @error('weight_range')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Amount : <span class="text-danger">*</span></b></label>
                                                <input type="text" id="amount" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" placeholder="Enter Amount">
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
                                    <button type="submit" class="btn btn-success">Submit</button>
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
