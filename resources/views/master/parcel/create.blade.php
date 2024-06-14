@extends('layouts.master')

@section('title')
    Parcel | Add
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
                            <h5>Add Parcel</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('parcel.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group-customer customer-additional-form">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Customer Name : <span class="text-danger">*</span></b></label>
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
                                                <label><b>Pickup Date : <span class="text-danger">*</span></b></label>
                                                <input type="text" id="pickup_dt" name="pickup_dt" class="form-control datetimepicker @error('pickup_dt') is-invalid @enderror" value="{{ old('pickup_dt') }}" placeholder="Enter Pickup Date">
                                                @error('pickup_dt')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>C. Note No. : <span class="text-danger">*</span></b></label>
                                                <input type="text" id="c_note_number" name="c_note_number" class="form-control @error('c_note_number') is-invalid @enderror" value="{{ old('c_note_number') }}" placeholder="Enter C. Note No.">
                                                @error('c_note_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Destination : <span class="text-danger">*</span></b></label>
                                                <input type="text" id="destination" name="destination" class="form-control @error('destination') is-invalid @enderror" value="{{ old('destination') }}" placeholder="Enter Destination">
                                                @error('destination')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Weight Range : <span class="text-danger">*</span></b></label>
                                                <select  class="form-control @error('unit_id') is-invalid @enderror select" id="unit_id" name="unit_id">
                                                    <option value="">Select Weight Range</option>
                                                    @foreach ($unit as $weightrange)
                                                    <option value="{{ $weightrange->id }}" {{ (old("unit_id") == $weightrange->id ? "selected":"") }}>{{ $weightrange->min_weight_range }} - {{ $weightrange->max_weight_range }} {{ $weightrange->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('unit_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Weight : <span class="text-danger">*</span></b></label>
                                                <input type="text" id="weight" name="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') }}" placeholder="Enter Weight">
                                                @error('weight')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Amount : <span class="text-danger">*</span></b></label>
                                                <input type="text" readonly id="amount" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" placeholder="Enter Amount">
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
                                    <a href="{{ route('parcel.index') }}" class="btn btn-danger">Cancel</a>
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
{{-- fetch weight --}}
<script>
    $(document).ready(function(){
        $(document).on('change','#weight', function() {
            let weight = $(this).val();
            let customer_id = $('#customer_id').val();
            let unit_id = $('#unit_id').val();

            $('#amount').show();
            $.ajax({
                method: 'POST',
                url: "{{ route('fetch_weight') }}",
                data: {
                    customerId: customer_id,
                    unitId: unit_id,
                    weight: weight,
                    _token : '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#amount').val(data.amount);
                }
            });
        });
    });
</script>
@endpush
