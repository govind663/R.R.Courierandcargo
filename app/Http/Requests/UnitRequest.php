<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
                'min_weight_range'=> __('required|string|max:255'),
                'max_weight_range'=> __('required|string|max:255'),
                'name'=> __('required|string|max:255'),
            ];
        }else{
            $rule = [
                'min_weight_range'=> __('required|string|max:255'),
                'max_weight_range'=> __('required|string|max:255'),
                'name'=> __('required|string|max:255'),
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'min_weight_range.required' => __('Minimum Weight Range is required'),
            'min_weight_range.string' => __('Minimum Weight Range must be a string'),
            'min_weight_range.max' => __('Minimum Weight Range must be less than or equal to 255 characters'),
            'max_weight_range.required' => __('Maximum Weight Range is required'),
            'max_weight_range.string' => __('Maximum Weight Range must be a string'),
            'max_weight_range.max' => __('Maximum Weight Range must be less than or equal to 255 characters'),
            'name.required' => __('Unit Name is required'),
            'name.string' => __('Unit Name must be a string'),
            'unit.max' => __('Unit Name must be less than or equal to 255 characters'),
        ];
    }
}
