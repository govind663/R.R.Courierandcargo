<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
                'name' => __('required|max:255'),
                'email'=> __('required|max:255|email'),
                'mobile_no'=> __('required|max:255|regex:/^([0-9\s\-\+\(\)]*)$/'),
                'address'=> __('required|max:255'),
                'gst_no'=> __('required|max:255'),
            ];
        }else{
            $rule = [
                'name' => __('required|max:255'),
                'email'=> __('required|max:255|email|unique:companies,email'),
                'mobile_no'=> __('required|max:255|regex:/^([0-9\s\-\+\(\)]*)$/|unique:companies,mobile_no'),
                'address'=> __('required|max:255'),
                'gst_no'=> __('required|max:255'),
            ];
        }
        return $rule;
    }


    public function messages()
    {
        return [
            'name.required' => __('Name is required'),
            'name.max' => __('The length of Name should not exceed 255 characters'),
            'email.required' => __('Email is required'),
            'email.max' => __('The length of Email should not exceed 255 characters'),
            'email.email' => __('The Email must be a valid email address'),
            'email.unique' => __('The Email has already been taken'),
            'mobile_no.required' => __('Mobile No is required'),
            'mobile_no.max' => __('The length of Mobile No should not exceed 255 characters'),
            'mobile_no.regex' => __('The Mobile No must be a valid Mobile No'),
            'mobile_no.unique' => __('The Mobile No has already been taken'),
            'address.required' => __('Address is required'),
            'address.max' => __('The length of Address should not exceed 255 characters'),
            'gst_no.required' => __('GST No is required'),
            'gst_no.max' => __('The length of GST No should not exceed 255 characters'),
        ];
    }
}
