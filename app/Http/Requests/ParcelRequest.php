<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParcelRequest extends FormRequest
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
                'customer_id' => __('required|exists:customers,id,deleted_at,NULL'),
                'pickup_dt' => __('required|max:255'),
                'c_note_number' => __('required|max:255'),
                'destination' => __('required|max:255'),
                'weight' => __('required|max:255'),
                'unit_id' => __('required|exists:units,id,deleted_at,NULL'),
                'amount'=> __('required|numeric'),
            ];
        }else{
            $rule = [
                'customer_id' => __('required|exists:customers,id,deleted_at,NULL'),
                'pickup_dt' => __('required|max:255'),
                'c_note_number' => __('required|max:255'),
                'destination' => __('required|max:255'),
                'weight' => __('required|max:255'),
                'unit_id' => __('required|exists:units,id,deleted_at,NULL'),
                'amount'=> __('required|numeric'),
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'customer_id.required' => __('Please Select Customer Name'),
            'customer_id.exists' => __('Customer Not Found'),
            'pickup_dt.required' => __('Pickup Date is required'),
            'c_note_number.required' => __('C. Note Number is required'),
            'destination.required' => __('Destination is required'),
            'weight.required' => __('Weight is required'),
            'weight.numeric' => __('Weight must be numeric'),
            'unit_id.required' => __('Please Select Weight Range'),
            'unit_id.exists' => __('Weight Range Not Found'),
            'amount.required' => __('Amount is required'),
            'amount.numeric' => __('Amount must be numeric'),
        ];
    }
}
