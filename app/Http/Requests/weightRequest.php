<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class weightRequest extends FormRequest
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
                'weight_range' => __('required|numeric'),
                'unit_id' => __('required|exists:units,id,deleted_at,NULL'),
                'amount'=> __('required|numeric'),
            ];
        }else{
            $rule = [
                'customer_id' => __('required|exists:customers,id,deleted_at,NULL'),
                'weight_range' => __('required|numeric'),
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
            'weight_range.required' => __('Please Select Weight Range'),
            'weight_range.numeric' => __('Weight Range must be numeric'),
            'unit_id.required' => __('Please Select Unit'),
            'unit_id.exists' => __('Unit Not Found'),
            'amount.required' => __('Amount is required'),
            'amount.numeric' => __('Amount must be numeric'),
        ];
    }
}
