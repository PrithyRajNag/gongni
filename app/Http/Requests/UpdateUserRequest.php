<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:3',
            'first_name_bn' => 'required',
            'last_name' => 'required|min:3',
            'last_name_bn' => 'required',
            'father_name' => 'required|min:3',
            'father_name_bn' => 'required',
            'mother_name' => 'required|min:3',
            'mother_name_bn' => 'required',
            'gender' => 'required',
            'phone_number' => 'required|min:11|max:14',
            'emergency_contact' => 'required|min:11|max:14',
            'dob' => 'required',
            'marital_status' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'nid' => 'required|min:10|max:17',
            'job_type' => 'required',
            'join_date' => 'required',
            'salary' => 'required',
            'designation' => 'required',
            'file.*' => 'mimes:doc,pdf,docx|max:10240',
            'cover' => 'image|mimes:jpeg,png,jpg|max:2048',
//            'email' => 'required',
        ];
    }
}
