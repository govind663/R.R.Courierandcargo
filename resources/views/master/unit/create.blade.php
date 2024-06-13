@extends('layouts.master')

@section('title')
    Unit | Add
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
                            <h5>Add Unit</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('unit.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group-customer customer-additional-form">
                                    <div class="row">

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Minimum Weight Range : <span class="text-danger">*</span></b></label>
                                                <input type="text" id="min_weight_range" name="min_weight_range" class="form-control @error('min_weight_range') is-invalid @enderror" value="{{ old('min_weight_range') }}" placeholder="Enter Minimum Weight Range">

                                                @error('min_weight_range')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Maximum Weight Range : <span class="text-danger">*</span></b></label>
                                                <input type="text" id="max_weight_range" name="max_weight_range" class="form-control @error('max_weight_range') is-invalid @enderror" value="{{ old('max_weight_range') }}" placeholder="Enter Maximum Weight Range">

                                                @error('max_weight_range')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Unit Name : <span class="text-danger">*</span></b></label>
                                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Unit Name">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="add-customer-btns text-start">
                                    <a href="{{ route('unit.index') }}" class="btn btn-danger">Cancel</a>
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
