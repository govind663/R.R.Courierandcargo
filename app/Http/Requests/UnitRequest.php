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
                'name'=> __('required|string|max:255'),
            ];
        }else{
            $rule = [
                'name'=> __('required|string|max:255'),
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'name.required' => __('Unit Name is required'),
            'name.string' => __('Unit Name must be a string'),
            'unit.max' => __('Unit Name must be less than or equal to 255 characters'),
        ];
    }
}
