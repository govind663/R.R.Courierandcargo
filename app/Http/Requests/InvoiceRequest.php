<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->id){
            $rule = [
                'parcel_no' => __('nullable|max:255'),
                'customer_id' => __('required|exists:customers,id,deleted_at,NULL'),
                'from_dt' => __('required|max:255'),
                'to_dt' => __('required|max:255'),
                'invoice_dt' => __('required|max:255'),
                'invoice_no'=> __('required|string|max:255'),
                'package_charges'=> __('required|numeric|min:0',),
            ];
        }else{
            $rule = [
                'parcel_no' => __('nullable|max:255'),
                'customer_id' => __('required|exists:customers,id,deleted_at,NULL'),
                'from_dt' => __('required|max:255'),
                'to_dt' => __('required|max:255'),
                'invoice_dt' => __('required|max:255'),
                'invoice_no'=> __('required|string|max:255'),
                'package_charges'=> __('required|numeric|min:0'),
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'customer_id.required' => __('Please Select Customer Name'),
            'customer_id.exists' => __('Customer Not Found'),

            'from_dt.required' => __('From Date is required'),
            'to_dt.required' => __('From Date is required'),
            'invoice_dt.required' => __('From Date is required'),
            'invoice_no.required' => __('Invoice No. is required'),
            'package_charges.required' => __('Package Charges is required'),
        ];
    }
}
